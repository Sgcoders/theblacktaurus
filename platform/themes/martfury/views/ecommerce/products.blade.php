<div id="SnackIt">
    <div class="snakbase-area wow fadeInLeft animated">
        <div class="container">
            <form action="{{ URL::current() }}" data-action="{{ route('public.products') }}"
                  method="GET" id="products-filter-form">
                @include(Theme::getThemeNamespace() . '::views/ecommerce/includes/filters')
            </form>
            <div class="tab-content ps-shopping" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                     aria-labelledby="v-pills-home-tab">
                    {{--                        <div class="products-found pt-2">--}}
                    {{--                            <strong>{{ $products->total() }}</strong><span--}}
                    {{--                                class="ml-1">{{ __('Products found') }}</span>--}}
                    {{--                        </div>--}}
                    <div id="snakbase" class="owl-carousel owl-theme ps-products-listing">
                        @include(Theme::getThemeNamespace('views.ecommerce.includes.product-items'))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
