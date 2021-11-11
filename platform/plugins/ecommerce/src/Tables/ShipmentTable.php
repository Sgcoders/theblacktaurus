<?php

namespace Botble\Ecommerce\Tables;

use BaseHelper;
use Botble\Ecommerce\Enums\OrderStatusEnum;
use Botble\Ecommerce\Enums\ShippingStatusEnum;
use Botble\Ecommerce\Repositories\Interfaces\ShipmentInterface;
use Botble\Table\Abstracts\TableAbstract;
use EcommerceHelper;
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

        if (!Auth::user()->hasPermission('orders.edit')) {
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
            ->editColumn('user_id', function ($item) {
                return $item->order->user->name ?? $item->order->address->name;
            })
//            ->editColumn('order_id', function ($item) {
//                return Html::link(route('orders.edit', $item->order->id), get_shipment_code($item->id));
//            })
            ->editColumn('shipping_method', function ($item) {
                return $item->order->shipping_method_name;
            })
            ->editColumn('price', function ($item) {
                return format_price($item->price) ;
            })
            ->editColumn('status', function ($item) {
                return $item->status->label() ? $this->cClean($item->status) : '&mdash;';
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            });


        $data = $data
            ->addColumn('operations', function ($item) {
                return $this->getOperations('ecommerce.shipments.edit', '', $item);
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
                'price',
                'created_at',
            ])
            ->with(['order'])
            ->where('status', '!=', ShippingStatusEnum::DELIVERED());

        return $this->applyScopes($query);
    }

    public function cClean($label){
        $class = 'info';
//        exit($label);
        switch ($label){
            case ShippingStatusEnum::DELIVERED: global $class; $class = 'success'; break;
            case ShippingStatusEnum::DELIVERING: global $class; $class = 'warning';break;
            case ShippingStatusEnum::NOT_DELIVERED: $class = 'danger';break;
            case ShippingStatusEnum::PICKING: $class = 'primary';break;
            case ShippingStatusEnum::CANCELED: $class = 'dark';break;
        }
        return '<span class="label-'.$class.' status-label">'.$label->label().'</span>';
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        $columns = [
            'id'      => [
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
                'class' => 'text-start',
            ],
            'user_id' => [
                'title' => trans('plugins/ecommerce::order.customer_label'),
                'class' => 'text-start',
            ],
//            'order_id'  => [
//                'title' => trans('plugins/ecommerce::order.order_id'),
//                'class' => 'text-center',
//            ],
            'shipping_method'  => [
                'name'  => 'order_id',
                'title' => trans('plugins/ecommerce::shipping.shipping_method'),
                'class' => 'text-center',
            ],
            'price'  => [
                'title' => trans('plugins/ecommerce::shipping.shipping_fee'),
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
//        return $this->addDeleteAction(route('shipments.deletes'), 'shipments.destroy', parent::bulkActions());
        return parent::bulkActions();
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
