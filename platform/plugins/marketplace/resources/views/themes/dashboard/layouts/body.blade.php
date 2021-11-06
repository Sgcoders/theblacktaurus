<div class="screen-overlay"></div>
<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a class="brand-wrap" href="{{ route('marketplace.vendor.dashboard') }}">
            @php $logo = theme_option('logo_vendor_dashboard', theme_option('logo')); @endphp
            @if ($logo)
                <img src="{{ RvMedia::getImageUrl($logo) }}" alt="{{ theme_option('site_title') }}">
            @endif
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
        </div>
    </div>
    @include(MarketplaceHelper::viewPath('dashboard.layouts.menu'))
</aside>
<main class="main-wrap">
    <header class="main-header navbar">
        <div class="col-search">
        </div>
        <div class="col-nav">
            <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
            <ul class="nav">
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{ auth('customer')->user()->avatar_url }}" alt="{{ auth('customer')->user()->name }}" /></a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                        <a class="dropdown-item" href="{{ route('customer.overview') }}"><i class="material-icons md-home"></i> {{ __('Account Information') }}</a>
                        <a class="dropdown-item" href="{{ route('customer.edit-account') }}"><i class="material-icons md-perm_identity"></i> {{ __('Update profile') }}</a>
                        <a class="dropdown-item" href="{{ route('customer.change-password') }}"><i class="material-icons md-lock"></i>{{ __('Change password') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('customer.logout') }}"><i class="material-icons md-exit_to_app"></i>{{ __('Logout') }}</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <section class="content-main">
        @yield('content')
    </section>
    <!-- content-main end// -->
    <footer class="main-footer font-xs">
        <div class="row">
            <div class="col-md-6">
                {!! clean(trans('core/base::layouts.copyright', ['year' => now()->format('Y'), 'company' => setting('admin_title', config('core.base.general.base_name')), 'version' => get_cms_version()])) !!}
            </div>
            <div class="col-md-6 text-end">
                @if (defined('LARAVEL_START')) {{ trans('core/base::layouts.page_loaded_time') }} {{ round((microtime(true) - LARAVEL_START), 2) }}s @endif
            </div>
        </div>
    </footer>
</main>
