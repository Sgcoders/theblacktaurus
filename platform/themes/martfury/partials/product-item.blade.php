@if ($product)
    <div>
        <a href="{{ $product->url }}">
            <figure>
                <img src="{{ RvMedia::getImageUrl($product->image, 'small', false, RvMedia::getDefaultImage()) }}"
                     alt="{{ $product->name }}">
            </figure>
        </a>
        <ul class="ps-product__actions">
                <li><a class="js-quick-view-button" href="#"
                       data-url="{{ route('public.ajax.quick-view', $product->id) }}" title="{{ __('Quick View') }}"><i
                            class="icon-eye"></i></a></li>
            <li><a class="js-add-to-wishlist-button" href="#"
                   data-url="{{ route('public.wishlist.add', $product->id) }}"
                   title="{{ __('Add to Wishlist') }}"><i class="icon-heart"></i></a></li>
            <li><a class="js-add-to-compare-button" href="#"
                   data-url="{{ route('public.compare.add', $product->id) }}" title="{{ __('Compare') }}"><i
                        class="icon-chart-bars"></i></a></li>
            </ul>
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

        <button class="add-to-cart-button" data-id="{{ $product->id }}" href="#"
                data-url="{{ route('public.ajax.addcart-box', $product->id) }}"><i
                class="fas fa-shopping-cart"></i>{{ __('Add To Cart') }}</button>
        </div>
    </div>
@endif
