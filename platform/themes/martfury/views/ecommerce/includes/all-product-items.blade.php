@include(Theme::getThemeNamespace('views.ecommerce.includes.all-product-items' . (request()->get('layout') == 'list' ? '-list' : '-grid')))
