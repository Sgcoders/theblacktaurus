<div class="row">
    @forelse ($products as $product)
        <div class="col-xl-3 col-lg-4 col-md-4 col-6">
            <div class="ps-product">
                {!! Theme::partial('product-item', compact('product')) !!}
            </div>
        </div>
    @empty
        {{--    <div class="alert alert-warning mt-4 w-100" role="alert">--}}
        {{--        {{ __(':total Product found', ['total' => 0]) }}--}}
        {{--    </div>--}}
    @endforelse
</div>

<input type="hidden" name="page" data-value="{{ $products->currentPage() }}">
<div class="ps-pagination">
    {!! $products->withQueryString()->links() !!}
</div>
