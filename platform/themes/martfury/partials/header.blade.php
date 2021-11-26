<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1"
          name="viewport"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts-->
    {{--    <link--}}
    {{--        href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Work Sans')) }}:300,400,500,600,700&amp;amp;subset=latin-ext"--}}
    {{--        rel="stylesheet" type="text/css">--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
          rel="stylesheet">
    <!-- CSS Library-->

    <style>
        :root {
            --color-1st: {{ theme_option('primary_color', '#fcb800') }};
            --color-2nd: {{ theme_option('secondary_color', '#222222') }};
            --primary-font: '{{ theme_option('primary_font', 'Work Sans') }}', sans-serif;
            --button-text-color: {{ theme_option('button_text_color', '#000') }};
            --header-text-color: {{ theme_option('header_text_color', '#000') }};
            --header-button-background-color: {{ theme_option('header_button_background_color', '#000') }};
            --header-button-text-color: {{ theme_option('header_button_text_color', '#fff') }};
            --header-text-hover-color: {{ theme_option('header_text_hover_color', '#fff') }};
            --header-text-accent-color: {{ theme_option('header_text_accent_color', '#222222') }};
            --header-diliver-border-color: {{ hex_to_rgba(theme_option('header_text_color', '#000'), 0.15) }};
        }
    </style>

    {!! Theme::header() !!}

</head>
<body @if (Theme::get('pageId')) id="{{ Theme::get('pageId') }}"
      @endif @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
{!! apply_filters(THEME_FRONT_BODY, null) !!}
<div id="alert-container"></div>
@php
    $categoriesWith = ['slugable', 'children', 'children.slugable', 'children.children', 'children.children.slugable', 'metadata'];
    $categories = !is_plugin_active('ecommerce') ? [] : ProductCategoryHelper::getAllProductCategories()
                ->where('status', \Botble\Base\Enums\BaseStatusEnum::PUBLISHED)
                ->where('parent_id', 0)
                ->loadMissing($categoriesWith);
@endphp

{!! Theme::get('topHeader') !!}
<div class="topbar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-sm-12">
                <span>Enjoy free shipping across Singapore. Limited period offer.. Hurry!!!</span></div>
            <div class="col-lg-5 col-sm-12">
                <ul class="topbar-links">
                    @if (auth('customer')->check())
                        <li><a href="{{ route('customer.overview') }}"
                               class="customer-name"><i class="fas fa-user"></i>{{ auth('customer')->user()->name }}</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="{{ route('customer.logout') }}">{{ __('Logout') }}</a></li>
                    @else
                        <li><a href="{{ route('customer.login') }}"><i class="fas fa-user"></i>{{ __('Login') }}</a>
                        </li>
                        <li>|</li>
                        <li><a
                                href="{{ route('customer.register') }}">{{ __('Register') }}</a></li>
                        @endif
                        </li>
                        <li>|</li>
                        <li><a class="btn-shopping-cart" href="{{ route('public.cart') }}"><i
                                    class="fas fa-shopping-cart"></i>Cart(<span style="margin-left: 0px !important;">{{ Cart::instance('cart')->count() }}</span> items)</a>
                        </li>
                        <li>|</li>
                        @if (is_plugin_active('language'))
                            {!! Theme::partial('language-switcher') !!}
                        @endif
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="container">
        <div class="row no-gutters d-flex flex-wrap align-content-stretch align-items-center">
            <div class="col-xl-4 col-lg-4 col-md-12 col-12 position-relative">
                <a href="{{ route('public.index')}}" class="logo"><img
                        src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                        alt="{{ theme_option('site_title') }}"></a>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-12">
                <div class="navigation-area">
                    <div id='cssmenu' class="float-lg-right">
{{--                        <ul>--}}
{{--                            <li><a href='#snackIt'>Snack It!</a></li>--}}
{{--                            <li><a href="{{ route('public.index')}}/about-us">About</a></li>--}}
{{--                            <li><a href='{{ route('public.index')}}/retail'>Retail</a></li>--}}
{{--                            <li><a href='{{ route('public.index')}}/contact'>Contact</a></li>--}}
{{--                        </ul>--}}
                        {!! Menu::renderMenuLocation('main-menu', [
                    'view'    => 'menu',
                    'options' => ['class' => 'menu'],
                ]) !!}
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</header>
