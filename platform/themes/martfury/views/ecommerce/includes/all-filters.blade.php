@php
    $brands = get_all_brands(['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED], ['slugable'], ['products']);
    $categories = ProductCategoryHelper::getAllProductCategories()
                        ->where('status', \Botble\Base\Enums\BaseStatusEnum::PUBLISHED)
                        ->where('parent_id', 0)
                        ->where('parent_id', null)
                        ->loadMissing(['slugable', 'children:id,name,parent_id', 'children.slugable']);
    $tags = app(\Botble\Ecommerce\Repositories\Interfaces\ProductTagInterface::class)->advancedGet([
        'condition' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED],
        'with'      => ['slugable'],
        'withCount' => ['products'],
        'order_by'  => ['products_count' => 'desc'],
        'take'      => 10,
    ]);
    $rand = mt_rand();
    $categoriesRequest = request()->input('categories', []);
    $urlCurrent = URL::current();
@endphp

<aside class="widget widget_shop">
    {{--    <h4 class="widget-title">{{ __('Product Categories') }}</h4>--}}
    @php
    /*$allPath = URL::to('product-categories/all');*/
    $allPath = URL::to('products');
    @endphp
    <ul class="ps-list--categories">
        <li class="@if (!empty($categoriesRequest && in_array('all', $categoriesRequest))) current-menu-item @endif">
            <a href="{{ $allPath }}">{{ __('All Products')}}</a>
        </li>
        @foreach($categories as $category)
            <li class="@if ($urlCurrent == $category->url || (!empty($categoriesRequest && in_array($category->id, $categoriesRequest)))) current-menu-item @endif @if ($category->children->count()) menu-item-has-children @endif">
                <a href="{{ $category->url }}">{{ $category->name }}</a>
                @if ($category->children->count())
                    @include(Theme::getThemeNamespace() . '::views.ecommerce.includes.sub-categories', ['children' => $category->children])
                @endif
            </li>
        @endforeach
    </ul>
</aside>
<aside class="widget widget_shop">
    {{--    <h4 class="widget-title">{{ __('Search product') }}</h4>--}}

    <div class="header__center">
        <form class="ps-form--quick-search" action="{{ route('public.products') }}"
              data-ajax-url="{{ route('public.ajax.search-products') }}" method="get">
            <input class="form-control" name="q" type="text" placeholder="{{ __("I'm shopping for...") }}"
                   id="input-search" autocomplete="off">
            <input type="hidden" name="sort-by" class="product-filter-item" value="{{ request()->input('sort-by') }}">
        </form>
    </div>
</aside>
<aside class="widget widget_shop">
    <h4 class="widget-title">{{ __('Sort By') }}</h4>
    <div class="widget__content nonlinear-wrapper">
        @include(Theme::getThemeNamespace() . '::views/ecommerce/includes/sort')
    </div>
</aside>
