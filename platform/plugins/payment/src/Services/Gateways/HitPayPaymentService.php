<?php

namespace Botble\Payment\Services\Gateways;

use Botble\Ecommerce\Enums\OrderStatusEnum;
use Botble\Payment\Enums\PaymentMethodEnum;
use Botble\Payment\Enums\PaymentStatusEnum;
use Botble\Payment\Services\Abstracts\HitPayPaymentAbstract;
use Botble\Ecommerce\Repositories\Interfaces\OrderHistoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Botble\Ecommerce\Supports\OrderHelper;

class HitPayPaymentService extends HitPayPaymentAbstract
{

    /**
     * @var OrderHistoryInterface
     */
    protected $orderHistoryRepository;
    /**
     * @param OrderHistoryInterface $orderHistoryRepository
     */
    public function _construct(
        OrderHistoryInterface $orderHistoryRepository
    ) {
        $this->orderHistoryRepository = $orderHistoryRepository;
    }

    /**
     * Make a payment
     *
     * @param Request $request
     *
     * @return mixed
     * @throws Exception
     */
    public function makePayment(Request $request)
    {
        $amount = round((float) $request->input('amount'), $this->isSupportedDecimals() ? 2 : 0);

        $data = [
            'name'     => $request->input('name'),
            'quantity' => 1,
            'price'    => $amount,
            'sku'      => null,
            'type'     => PaymentMethodEnum::HITPAY,
        ];

        $currency = $request->input('currency', config('plugins.payment.payment.currency'));
        $currency = strtoupper($currency);

        $queryParams = [
            'type'     => PaymentMethodEnum::HITPAY,
            'amount'   => $amount,
            'currency' => $currency,
            'order_id' => $request->input('order_id'),
        ];

        $checkoutUrl = $this
            ->setReturnUrl($request->input('callback_url1') . '?' . http_build_query($queryParams))
            ->setAmount($amount)
            ->setCurrency($currency)
//            ->setCustomer($request->input('address.email'))
            ->createPayment();

        return $checkoutUrl;
    }

    /**
     * Use this function to perform more logic after user has made a payment
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function afterMakePayment(Request $request)
    {
        $status = PaymentStatusEnum::COMPLETED;
        $chargeId = session('hitpay_payment_id');

        $orderIds = (array)$request->input('order_id', []);

        do_action(PAYMENT_ACTION_PAYMENT_PROCESSED, [
            'amount'          => $request->input('amount'),
            'currency'        => $request->input('currency'),
            'charge_id'       => $chargeId,
            'order_id'        => $orderIds,
            'customer_id'     => $request->input('customer_id'),
            'customer_type'   => $request->input('customer_type'),
            'payment_channel' => PaymentMethodEnum::HITPAY,
            'status'          => $status
        ]);
        OrderHelper::confirmPayment($orderIds, true);
        session()->forget('hitpay_payment_id');

        return $chargeId;
    }

}
