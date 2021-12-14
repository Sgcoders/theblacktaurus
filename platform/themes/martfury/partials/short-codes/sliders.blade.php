@if (count($sliders) > 0)
    @if (is_plugin_active('ads') && (AdsManager::locationHasAds('top-slider-image-1') || AdsManager::locationHasAds('top-slider-image-2')))
        <div class="ps-home-banner ps-home-banner--1">
            <div class="ps-container">
                <div class="ps-section__left">
                    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true"
                         data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true"
                         data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1"
                         data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on"
                         data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                        @foreach($sliders as $slider)
                            <div class="ps-banner bg--cover"
                                 data-background="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}">
                                @if ($slider->link)
                                    <a class="ps-banner__overlay" href="{{ url($slider->link) }}"></a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="ps-section__right">
                    <div class="ps-collection">
                        {!! AdsManager::display('top-slider-image-1') !!}
                    </div>
                    <div class="ps-collection">
                        {!! AdsManager::display('top-slider-image-2') !!}
                    </div>
                </div>
                {{--                <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true"--}}
                {{--                     data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1"--}}
                {{--                     data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1"--}}
                {{--                     data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn"--}}
                {{--                     data-owl-animate-out="fadeOut">--}}
                {{--                    @foreach($sliders as $slider)--}}
                {{--                        <div class="ps-banner bg--cover"--}}
                {{--                             data-background="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}">--}}
                {{--                            @if ($slider->link)--}}
                {{--                                <a class="ps-banner__overlay" href="{{ url($slider->link) }}"></a>--}}
                {{--                            @endif--}}
                {{--                        </div>--}}
                {{--                    @endforeach--}}
                {{--                </div>--}}
                {{--                @endif--}}
            </div>
        </div>
    @else
        <div class="indx-slider">
            <div id="heroBanner" class="justify-cntent-center align-items-center">
                <div id="bannerCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                    <div class="carousel-inner" role="listbox">
                        @foreach($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                @if ($slider->link)
                                    <a class="ps-banner__overlay" href="{{ url($slider->link) }}">
                                @endif
                                <div class="carousel-background"><img
                                        src="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}"
                                        alt="" class="img-fluid d-block mx-auto">
                                </div>
                                <div class="carousel-container first-carousel-content">
                                    <div class="carousel-content">
                                    </div>
                                </div>
                                @if ($slider->link)
                                    </a>
                                @endif
                            </div>
                        @endforeach

                    </div>

                    <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"><i class="fas fa-angle-left"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"><i class="fas fa-angle-right"></i></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>

        </div>
    @endif

@endif
