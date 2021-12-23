@php
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


<div class="nav-holder">
    <h2 class="text-uppercase text-center">{{ __('Snack Bases') }}</h2>
    <div class="nav-holderinner">
        <ul class="nav justify-content-center nav-pills ps-list--categories" id="v-pills-tab" role="tablist"
             aria-orientation="vertical">
            {{--            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"--}}
            {{--                               role="tab" aria-controls="v-pills-home" aria-selected="true"><i--}}
            {{--                                    class="fas fa-caret-right"></i>Fish Skin</a>--}}
            @foreach($categories as $category)
{{--                <a class="nav-link--}}
{{--                    @if ($urlCurrent == str_replace('product-categories/', '', $category->url)--}}
{{--                    || (!empty($categoriesRequest && in_array($category->id, $categoriesRequest)))) active @endif"--}}
{{--                   href="{{str_replace(Language::getCurrentLocale() != Language::getDefaultLocale() ? Language::getCurrentLocale().'/' : '', '', $category->url)}}">--}}
                <li class="list-item">
                <a class="nav-link
                    @if ($urlCurrent == str_replace('product-categories/', '', $category->url)
                    || (!empty($categoriesRequest && in_array($category->id, $categoriesRequest)))) active @endif"
                   href="{{$category->url}}?home=true">
                   {{ $category->name }}</a>
                @if ($category->children->count())
                    @include(Theme::getThemeNamespace() . '::views.ecommerce.includes.sub-categories', ['children' => $category->children])
                @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>


<input type="hidden" name="sort-by" class="product-filter-item" value="{{ request()->input('sort-by') }}">
<input type="hidden" name="layout" class="product-filter-item" value="{{ request()->input('layout') }}">
