@forelse ($products as $product)
    <div class="item">
        {!! Theme::partial('product-category-item', compact('product')) !!}
    </div>
@empty
{{--    <div class="alert alert-warning mt-4 w-100" role="alert">--}}
{{--        {{ __(':total Product found', ['total' => 0]) }}--}}
{{--    </div>--}}
@endforelse
{{--<div class="ps-pagination">--}}
{{--    {!! $products->withQueryString()->links() !!}--}}
{{--</div>--}}
