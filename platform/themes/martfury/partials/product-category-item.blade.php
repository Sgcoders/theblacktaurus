@if ($product)
    <a href="{{ $product->url }}">
        <figure>
            <img src="{{ RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage()) }}"
                 alt="{{ $product->name }}">
        </figure>
        <div>
            <h3>{{ $product->name }}</h3>
            {!! apply_filters('ecommerce_before_product_description', null, $product) !!}
            <p class="product-description" id="detail-description">
                {!! $product->description !!}
            </p>
            {!! apply_filters('ecommerce_after_product_description', null, $product) !!}
            <span>Know More</span>
        </div>
    </a>
@endif
