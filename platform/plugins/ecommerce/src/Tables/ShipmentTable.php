<?php

namespace Botble\Ecommerce\Tables;

use BaseHelper;
use Botble\Ecommerce\Enums\ShippingStatusEnum;
use Botble\Ecommerce\Repositories\Interfaces\ShipmentInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Html;

class ShipmentTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;
    protected $hasOperations = false;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * OrderTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param ShipmentInterface $shipmentRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, ShipmentInterface $shipmentRepository)
    {
        parent::__construct($table, $urlGenerator);

        $this->repository = $shipmentRepository;
        if (!Auth::user()->hasPermission('shipments.bulk')) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('order_id', function ($item) {
                return Html::link(route('orders.edit', $item->order->id), get_shipment_code($item->id));
            })
            ->editColumn('user_id', function ($item) {
                return $item->order->user->name ?? $item->order->address->name;
            })
            ->editColumn('note', function ($item) {
                return $item->order->address->phone;
            })
            ->editColumn('weight', function ($item) {
                $html = "";
                foreach ($item->order->products as $product) {
                    $html .='<span class="badge badge-pill badge-primary">'.$product->product_name.' | QTY- '.$product->qty.'</span><br/>';
                }
                return $html;
            })
            ->editColumn('shipment_id', function ($item) {
                return $item->order->shipping_method_name;
            })
            ->editColumn('status', function ($item) {
                return $item->status->label() ? $this->cClean($item->status) : '&mdash;';
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            });



        return $this->toJson($data);
    }

    /**
     * {@inheritDoc}T
     */
    public function query()
    {
        $query = $this->repository->getModel()
            ->select([
                'id',
                'order_id',
                'status',
                'created_at',
            ])
            ->with(['order'])
            ->where('status', '!=', ShippingStatusEnum::DELIVERED());

        return $this->applyScopes($query);
    }

    public function cClean($label){
        $class = 'info';
        switch ($label){
            case ShippingStatusEnum::DELIVERED: global $class; $class = 'primary'; break;
            case ShippingStatusEnum::DELIVERING: global $class; $class = 'warning';break;
            case ShippingStatusEnum::KIV: $class = 'default';break;
            case ShippingStatusEnum::PENDING: $class = 'info';break;
            case ShippingStatusEnum::CANCELED: $class = 'danger';break;
            case ShippingStatusEnum::APPROVED: $class = 'success';break;
        }
        return '<span class="label-'.$class.' status-label">'.$label->label().'</span>';
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        $columns = [
            'order_id'  => [
                'title' => trans('plugins/ecommerce::order.order_id'),
                'class' => 'text-center',
            ],
            'user_id' => [
                'title' => trans('plugins/ecommerce::order.customer_label'),
                'class' => 'text-start',
            ],
            'note'  => [
                'title' => trans('plugins/ecommerce::shipping.phone'),
                'class' => 'text-center',
            ],
            'weight'  => [
                'title' => trans('plugins/ecommerce::products.name'),
                'class' => 'text-center',
            ],
            'shipment_id'  => [
                'title' => trans('plugins/ecommerce::shipping.shipping_method'),
                'class' => 'text-center',
            ],
            'status'  => [
                'title' => trans('plugins/ecommerce::shipping.shipping_status'),
                'class' => 'text-center',
            ],
        ];

        $columns += [
            'created_at'      => [
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
                'class' => 'text-start',
            ],
        ];

        return $columns;
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return parent::bulkActions();
//        $actions = [];
//        if ($this->getBulkChanges()) {
//            $actions['bulk-change'] = view('core/table::bulk-changes', [
//                'bulk_changes' => $this->getBulkChanges(),
//                'class'        => get_class($this),
//                'url'          => route('ecommerce.shipments.bulk-update'),
//            ])->render();
//        }
//        return $actions;
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'status'     => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => ShippingStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', ShippingStatusEnum::values()),
            ]
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function renderTable($data = [], $mergeData = [])
    {
//        if ($this->query()->count() === 0 &&
//            !$this->request()->wantsJson() &&
//            $this->request()->input('filter_table_id') !== $this->getOption('id') && !$this->request()->ajax()
//        ) {
//            return view('plugins/ecommerce::orders.intro');
//        }

        return parent::renderTable($data, $mergeData);
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultButtons(): array
    {
        return [
            'export',
            'reload',
        ];
    }
}
