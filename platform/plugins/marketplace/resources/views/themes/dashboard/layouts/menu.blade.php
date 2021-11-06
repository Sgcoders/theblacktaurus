@php
    $menus = [
        [
            'key'   => 'marketplace.vendor.dashboard',
            'icon'  => 'md-home',
            'name'  => __('Dashboard')
        ],
        [
            'key'   => 'marketplace.vendor.products.index',
            'icon'  => 'md-shopping_bag',
            'name'  => __('Products')
        ],
        [
            'key'   => 'marketplace.vendor.orders.index',
            'icon'  => 'md-shopping_cart',
            'name'  => __('Orders')
        ],
        [
            'key'   => 'marketplace.vendor.discounts.index',
            'icon'  => 'md-local_offer',
            'name'  => __('Coupons')
        ],
        [
            'key'   => 'marketplace.vendor.withdrawals.index',
            'icon'  => 'md-monetization_on',
            'name'  => __('Withdrawals')
        ],
        [
            'key'   => 'marketplace.vendor.settings',
            'icon'  => 'md-settings',
            'name'  => __('Settings')
        ],
        [
            'key'   => 'customer.overview',
            'icon'  => 'md-person',
            'name'  => __('Customer dashboard')
        ],
    ];
@endphp

<nav>
    <ul class="menu-aside">
        @foreach ($menus as $item)
        <li class="menu-item @if (Route::currentRouteName() == $item['key']) active @endif">
            <a class="menu-link" href="{{ route($item['key']) }}">
                <i class="icon material-icons {{ $item['icon'] }}"></i>
                <span class="text">{{ $item['name'] }}</span>
            </a>
        </li>
        @endforeach
    </ul>
</nav>
