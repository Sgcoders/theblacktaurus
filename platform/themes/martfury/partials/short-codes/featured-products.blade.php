<div class="latestproduct-area">
    <div class="container">
            <h2 class="main-heading wow fadeInUp animated">{!! clean($title) !!}</h2>
        <div id="indxproductsale" class="owl-theme wow fadeInUp animated">
        <featured-products-component url="{{ route('public.ajax.featured-products') }}" limit="{{ $limit }}"></featured-products-component>
        </div>
    </div>
</div>

