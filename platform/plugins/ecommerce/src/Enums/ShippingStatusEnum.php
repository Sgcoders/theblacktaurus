<?php

namespace Botble\Ecommerce\Enums;

use Botble\Base\Supports\Enum;

/**
 * @method static ShippingStatusEnum APPROVED()
 * @method static ShippingStatusEnum SELF_COLLECT()
 * @method static ShippingStatusEnum PENDING()
 * @method static ShippingStatusEnum DELIVERING()
 * @method static ShippingStatusEnum DELIVERED()
 * @method static ShippingStatusEnum KIV()
 * @method static ShippingStatusEnum CANCELED()
 */
class ShippingStatusEnum extends Enum
{
    public const SELF_COLLECT = 'self_collect';
    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const DELIVERING = 'delivering';
    public const DELIVERED = 'delivered';
    public const CANCELED = 'canceled';
    public const KIV = 'kiv';

    /**
     * @var string
     */
    public static $langPath = 'plugins/ecommerce::shipping.statuses';
}
