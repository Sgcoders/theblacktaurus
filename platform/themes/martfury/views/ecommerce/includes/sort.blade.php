<select class="ps-select ps-select-shop-sort" data-placeholder="{{ __('Sort Items') }}" style="width:100%">
    @foreach (EcommerceHelper::getSortParams() as $key => $name)
        <option value="{{ $key }}" @if (request()->input('sort-by') == $key) selected @endif>{{ $name }}</option>
    @endforeach
</select>
