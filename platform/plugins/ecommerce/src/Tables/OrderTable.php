<?php

namespace Botble\Ecommerce\Tables;

use BaseHelper;
use Botble\Ecommerce\Enums\OrderStatusEnum;
use Botble\Ecommerce\Repositories\Interfaces\OrderInterface;
use Botble\Payment\Enums\PaymentStatusEnum;
use Botble\Table\Abstracts\TableAbstract;
use EcommerceHelper;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Botble\Ecommerce\Enums\ShippingStatusEnum;

class OrderTable extends TableAbstract
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
     * @param OrderInterface $orderRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, OrderInterface $orderRepository)
    {
        parent::__construct($table, $urlGenerator);

        $this->repository = $orderRepository;

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
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            })
            ->editColumn('payment_status', function ($item) {
                return $item->payment->status->label() ? clean($item->payment->status->toHtml()) : '&mdash;';
            })
            ->editColumn('shipping_option', function ($item) {
                return $item->shipment->status->label() ? $this->cClean($item->shipment->status) : '&mdash;';
            })
            ->editColumn('payment_method', function ($item) {
                return $item->payment->payment_channel->label() ? clean($item->payment->payment_channel->label()) : '&mdash;';
            })
            ->editColumn('amount', function ($item) {
                return format_price($item->amount);
            })
            ->editColumn('shipping_amount', function ($item) {
                return format_price($item->shipping_amount);
            })
            ->editColumn('user_id', function ($item) {
                return $item->user->name ?? $item->address->name;
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            });

        if (EcommerceHelper::isTaxEnabled()) {
            $data = $data->editColumn('tax_amount', function ($item) {
                return format_price($item->tax_amount);
            });
        }

        $data = $data
            ->addColumn('operations', function ($item) {
                return $this->getOperations('orders.edit', 'orders.destroy', $item);
            });

        return $this->toJson($data);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $query = $this->repository->getModel()
            ->select([
                'ec_orders.id',
                'ec_orders.status',
                'ec_orders.user_id',
                'ec_orders.created_at',
                'ec_orders.amount',
                'ec_orders.tax_amount',
                'ec_orders.shipping_amount',
                'ec_orders.payment_id',
            ])
            ->leftJoin('payments', 'ec_orders.payment_id', '=', 'payments.id')
            ->leftJoin('ec_shipments', 'ec_orders.id', '=', 'ec_shipments.order_id')
            ->with(['user', 'payment', 'shipment'])
            ->where('is_finished', 1);
        return $this->applyScopes($query);
    }




    /**
     * @return array
     */
    public function getFilters(): array
    {
        return [
            'payments.status'     => [
                'title'    => trans('plugins/ecommerce::order.payment_status_label'),
                'type'     => 'select',
                'choices'  => PaymentStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', PaymentStatusEnum::values()),
            ],
            'ec_shipments.status'     => [
                'title'    => trans('plugins/ecommerce::shipping.shipping_status'),
                'type'     => 'select',
                'choices'  => ShippingStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', ShippingStatusEnum::values()),
            ],
            'ec_orders.status'     => [
                'title'    => trans('plugins/ecommerce::order.order').' '.trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => OrderStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', OrderStatusEnum::values()),
            ],
        ];
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
            'amount'  => [
                'title' => trans('plugins/ecommerce::order.amount'),
                'class' => 'text-center',
            ],
        ];

        if (EcommerceHelper::isTaxEnabled()) {
            $columns['tax_amount'] = [
                'title' => trans('plugins/ecommerce::order.tax_amount'),
                'class' => 'text-center',
            ];
        }

        $columns += [
            'shipping_amount' => [
                'title' => trans('plugins/ecommerce::order.shipping_amount'),
                'class' => 'text-center',
            ],
            'payment_method'  => [
                'name'  => 'payment_id',
                'title' => trans('plugins/ecommerce::order.payment_method'),
                'class' => 'text-center',
            ],
            'payment_status'  => [
                'name'  => 'payment_id',
                'title' => trans('plugins/ecommerce::order.payment_status_label'),
                'class' => 'text-center',
            ],
            'shipping_option'  => [
                'name'  => 'payment_id',
                'title' => trans('plugins/ecommerce::shipping.shipping_status'),
                'class' => 'text-center',
            ],
            'status'          => [
                'title' => trans('plugins/ecommerce::order.order').' '.trans('core/base::tables.status'),
                'class' => 'text-center',
            ],
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
    public function buttons()
    {
        return $this->addCreateButton(route('orders.create'), 'orders.create');
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('orders.deletes'), 'orders.destroy', parent::bulkActions());
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
                'choices'  => OrderStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', OrderStatusEnum::values()),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }


    /**
     * {@inheritDoc}
     */
    public function renderTable($data = [], $mergeData = [])
    {
        if ($this->query()->count() === 0 &&
            !$this->request()->wantsJson() &&
            $this->request()->input('filter_table_id') !== $this->getOption('id') && !$this->request()->ajax()
        ) {
            return view('plugins/ecommerce::orders.intro');
        }

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

    public static function cClean($label){
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
}
