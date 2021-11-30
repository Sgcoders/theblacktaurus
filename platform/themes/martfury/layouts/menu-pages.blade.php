{!! Theme::partial('header') !!}


<div class="inner-banner wow fadeIn animated">
    <img src="{{ URL::to('/') }}/storage/pages/inner-banner.jpg" class="w-100" alt="">
    <div class="banner-header">
        <h1 class="page-title"></h1>
        <div class="breadcrumb-area">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active page-title" aria-current="page"></li>
            </ol>
        </div>
    </div>
</div>
{!! Theme::content() !!}

{!! Theme::partial('footer') !!}
