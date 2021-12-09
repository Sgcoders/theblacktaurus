@if ($product)
    <div>
        <a href="{{ $product->url }}">
            <figure>
                <img src="{{ RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage()) }}"
                     alt="{{ $product->name }}">
            </figure>
        </a>

        <button class="add-to-cart-button" data-id="{{ $product->id }}" href="#"
                data-url="{{ route('public.cart.add-to-cart') }}"><i
                class="fas fa-shopping-cart"></i>{{ __('Add To Cart') }}</button>
        <div>

            <h3>{{ $product->name }}</h3>
            {!! apply_filters('ecommerce_before_product_price_in_listing', null, $product) !!}
            <span class="price @if ($product->front_sale_price !== $product->price) sale @endif">{{ format_price($product->front_sale_price_with_taxes) }}
                @if ($product->front_sale_price !== $product->price)
                    <del>{{ format_price($product->price_with_taxes) }} </del> @endif
            </span>
            {!! apply_filters('ecommerce_after_product_price_in_listing', null, $product) !!}
            @if (EcommerceHelper::isReviewEnabled())
                <div class="rating_wrap">
                    <div class="rating">
                        <div class="product_rate" style="width: {{ $product->reviews_avg * 20 }}%"></div>
                    </div>
                    <span class="rating_num">({{ $product->reviews_count }})</span>
                </div>
            @endif
        </div>
    </div>
@endif
