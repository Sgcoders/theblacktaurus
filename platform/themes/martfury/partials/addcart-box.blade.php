<div class="ps-product__header">
    <div class="ps-product__thumbnail" data-vertical="false">
        <div class="ps-product__images" data-arrow="true">
            @foreach ($productImages as $img)
                <div class="item"><img src="{{ RvMedia::getImageUrl($img) }}" alt="{{ $product->name }}"></div>
            @endforeach
        </div>
    </div>
    <div class="ps-product__info">
        <h1><a href="{{ $product->url }}">{{ $product->name }}</a></h1>
        @if ($product->variations()->count() > 0)
            <div class="pr_switch_wrap">
                {!! render_product_swatches($product, [
                    'selected' => $selectedAttrs,
                    'view'     => Theme::getThemeNamespace() . '::views.ecommerce.attributes.swatches-renderer'
                ]) !!}
            </div>
            <div class="number-items-available" style="display: none; margin-bottom: 10px;"></div>
        @endif
        <form class="add-to-cart-form" method="POST" action="{{ route('public.cart.add-to-cart') }}">
            @csrf
            <div class="ps-product__shopping">
                <input type="hidden" name="id" class="hidden-product-id"
                       value="{{ ($product->is_variation || !$product->defaultVariation->product_id) ? $product->id : $product->defaultVariation->product_id }}"/>
                {{--                <input type="hidden" name="qty" value="1">--}}
                <figure>
                    <figcaption>{{ __('Quantity') }}</figcaption>
                    <div class="form-group--number product__qty">
                        <button class="up" type="button"><i class="icon-plus"></i></button>
                        <button class="down" type="button"><i class="icon-minus"></i></button>
                        <input class="form-control qty-input" type="text" name="qty" value="1" placeholder="1" readonly>
                    </div>
                </figure>
                @if (EcommerceHelper::isCartEnabled())
                    <button class="ps-btn ps-btn--black" type="submit">{{ __('Add to cart') }}</button>
                @endif
            </div>
        </form>
    </div>
</div>
