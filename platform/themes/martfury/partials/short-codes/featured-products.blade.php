<div class="latestproduct-area">
    <div class="container">
            <h2 class="main-heading wow fadeInUp animated">{!! clean($title) !!}</h2>
{{--            <ul class="ps-section__links">--}}
{{--                <li><a href="{{ route('public.products') }}">{{ __('View All') }}</a></li>--}}
{{--            </ul>--}}
        <div id="indxproductsale" class="owl-theme wow fadeInUp animated">
        <featured-products-component url="{{ route('public.ajax.featured-products') }}" limit="{{ $limit }}"></featured-products-component>
        </div>
    </div>
</div>

