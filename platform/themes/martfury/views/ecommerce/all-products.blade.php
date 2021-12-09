<div class="ps-page--shop">
    <div class="ps-container" @if (Route::currentRouteName() == 'public.products') id="app" @endif>
        <div class="ps-layout--shop">
            <div class="ps-layout__left">
                <div class="screen-darken"></div>
                <div class="ps-layout__left-container">
                    <div class="ps-filter__header d-block d-xl-none">
                        <h3>{{ __('Filter Products') }}</h3><a class="ps-btn--close ps-btn--no-boder" href="#"></a>
                    </div>
                    <div class="ps-layout__left-content">
                        <form action="{{ URL::current() }}" data-action="{{ route('public.products') }}" method="GET" id="products-filter-form">
                            @include(Theme::getThemeNamespace() . '::views/ecommerce/includes/all-filters')
                        </form>
                    </div>
                </div>
            </div>
            <div class="ps-layout__right">
                <div class="ps-shopping ps-tab-root">
                    <div class="row bg-light py-2 mb-3">
                        <div class="col-12 col-sm-6 col-md-3 d-xl-none px-2 px-sm-3">
                            <div class="header__filter d-xl-none mx-auto mb-3 mb-sm-0">
                                <button id="products-filter-sidebar" type="button">
                                    <i class="icon-equalizer"></i><span class="ml-2">{{ __('Filter') }}</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 col-xl-6 d-none d-md-block">
                            <div class="products-found pt-2">
                                <strong>{{ $products->total() }}</strong><span class="ml-1">{{ __('Products found') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="ps-tabs ps-products-listing">
                        @include(Theme::getThemeNamespace('views.ecommerce.includes.all-product-items'))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
