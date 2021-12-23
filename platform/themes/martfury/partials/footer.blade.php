<!-- Footer Area -->
<div class="footer-area" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 wow fadeInLeft animated">
                <div>
                    <img src="{{ URL::to('/') }}/storage/pages/footer-logo.png" class="img-fluid d-block">
                    <div id="moveOnMobile">
                        <p>Consistent product quality, on-time<br/>
                            delivery, and swift product launch,<br/>
                            make FT Global the ideal contract<br/>
                            food manufacturing partner</p>
                        <ul class="footer-social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 wow fadeInUp animated">
                <div>
                    <h5>{{ __('Products') }}</h5>
                    <ul class="footer-bullete latest-products-link">
                        {{--                    <li><a href='#'><i class="fas fa-caret-right"></i>Salted Egg Fish Skin</a></li>--}}
                        {{--                    <li><a href='#'><i class="fas fa-caret-right"></i>Salted Egg Potato Chips</a></li>--}}
                        {{--                    <li><a href='.html'><i class="fas fa-caret-right"></i>Crispy General Fish Skin</a></li>--}}
                        {{--                    <li><a href='.html'><i class="fas fa-caret-right"></i>Prawn Cracker</a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-6 col-lg-3 wow fadeInUp animated">
                <div>
                    <h5>{{__('Explore')}}</h5>

                    {!! Menu::renderMenuLocation('main-menu', [
                'view'    => 'menu',
                'options' => ['class' => 'footer-bullete'],
            ]) !!}
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInRight animated">
                <div>
                    <h5>{{__('Newsletter')}}</h5>
                    <p>{{__('Get Insider')}}</p>
                    <form method="post" action="{{ route('public.newsletter.subscribe') }}">
                        @csrf
                        <div class="input-group input-group-lg pt-0">
                            <input type="text" class="form-control subinpput shadow-none" name="email" type="email"
                                   placeholder="{{ __('Email Address') }}">
                            <div class="input-group-append pt-0">
                                <button type="submit" class="btn btn-warning cubtn">{{ __('Subscribe') }}</button>
                            </div>
                        </div>
                    </form>
                    {{--                    <ul class="privacypl">--}}
                    {{--                        <li><a href="">Terms & Conditions </a></li>--}}
                    {{--                        <li>|</li>--}}
                    {{--                        <li><a href="">Privacy Policy</a></li>--}}
                    {{--                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area wow fadeInUp animated">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-md-12 order-md-2 text-lg-right">
                    @php $paymentMethods = array_filter(json_decode(theme_option('payment_methods', []), true)); @endphp
                    @if ($paymentMethods)
                        <div class="footer-payments">
                            <p class="d-sm-inline-block d-block">
                                @foreach($paymentMethods as $method)
                                    @if (!empty($method))
                                        <span><img src="{{ RvMedia::getImageUrl($method) }}"
                                                   alt="payment method"></span>
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    @endif
                </div>
                <div class="col-md-6 order-md-1 copyright-txt">
                    <span>{{ theme_option('copyright') }}</span>
                </div>

            </div>
        </div>
    </div>
</div>
@if (!is_plugin_active('newsletter') && theme_option('enable_newsletter_popup', 'yes') === 'yes')
    <div data-session-domain="{{ config('session.domain') ?? request()->getHost() }}"></div>
    <div class="ps-popup" id="subscribe" data-time="{{ (int)theme_option('newsletter_show_after_seconds', 10) * 1000 }}"
         style="display: none">
        <div class="ps-popup__content bg--cover"
             data-background="{{ RvMedia::getImageUrl(theme_option('newsletter_image')) }}"
             style="background-size: cover!important;"><a class="ps-popup__close" href="#"><i
                    class="icon-cross"></i></a>
            <form method="post" action="{{ route('public.newsletter.subscribe') }}"
                  class="ps-form--subscribe-popup newsletter-form">
                @csrf
                <div class="ps-form__content">
                    <h4>{{ __('Get 25% Discount') }}</h4>
                    <p>{{ __('Subscribe to the mailing list to receive updates on new arrivals, special offers and our promotions.') }}</p>
                    <div class="form-group">
                        <input class="form-control" name="email" type="email" placeholder="{{ __('Email Address') }}"
                               required>
                    </div>

                    @if (setting('enable_captcha') && is_plugin_active('captcha'))
                        <div class="form-group">
                            {!! Captcha::display() !!}
                        </div>
                    @endif

                    <div class="form-group">
                        <button class="ps-btn" type="submit">{{ __('Subscribe') }}</button>
                    </div>
                    <div class="ps-checkbox">
                        <input class="form-control" type="checkbox" id="dont_show_again" name="dont_show_again">
                        <label for="dont_show_again">{{ __("Don't show this popup again") }}</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif

{!! Theme::get('bottomFooter') !!}

<div id="back2top"><i class="icon icon-arrow-up"></i></div>
<div class="ps-site-overlay"></div>
@if (is_plugin_active('ecommerce'))
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="{{ route('public.products') }}" method="post">
                <input class="form-control" name="q" value="{{ request()->query('q') }}" type="text"
                       placeholder="{{ __('Search for...') }}">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
@endif
<div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
            <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
            </article>
        </div>
    </div>
</div>
<div class="modal fade" id="product-addto-cart" tabindex="-1" role="dialog" aria-labelledby="product-addto-cart"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
            <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
            </article>
        </div>
    </div>
</div>
@if (get_ecommerce_setting('bg_music'))
    <div class="bg_music">
        @php
            $bg_music = RvMedia::url(get_ecommerce_setting('bg_music'));
            $silence_music = RvMedia::url('general/silence.mp3');
        @endphp
        <iframe src="{{$silence_music}}" allow="autoplay" id="iframeAudio" class="d-none">
        </iframe>
        <audio autoplay loop id="bgMusic">
            <source src="{{$bg_music}}" type="audio/mp3">
        </audio>
    </div>
@endif

<script>
    document.addEventListener('click', musicPlay);
    function musicPlay() {
        $('#bgMusic')[0].play();
        document.removeEventListener('click', musicPlay);
    }
    window.trans = {
        "View All": "{{ __('View All') }}",
        "No reviews!": "{{ __('No reviews!') }}",
    }
    window.siteUrl = "{{ url('') }}";
</script>

{!! Theme::footer() !!}

@if (session()->has('success_msg') || session()->has('error_msg') || (isset($errors) && $errors->count() > 0) || isset($error_msg))
    <script type="text/javascript">
        $(document).ready(function () {
            @if (session()->has('success_msg'))
            window.showAlert('alert-success', '{{ session('success_msg') }}');
            @endif

            @if (session()->has('error_msg'))
            window.showAlert('alert-danger', '{{ session('error_msg') }}');
            @endif

            @if (isset($error_msg))
            window.showAlert('alert-danger', '{{ $error_msg }}');
            @endif

            @if (isset($errors))
            @foreach ($errors->all() as $error)
            window.showAlert('alert-danger', '{!! $error !!}');
            @endforeach
            @endif
        });
    </script>
@endif
@if (env('APP_URL') != 'http://localhost:8000')
    <script type="text/javascript">
        $(document).ready(function () {
            axios.get("{{ route('public.ajax.featured-products-link') }}")
                .then(res => {
                    $('.latest-products-link').html(res.data.data);
                })
                .catch(res => {
                    console.log(res);
                });
            $('.select2-selection__arrow').addClass('fas fa-arrow-down');
            $('.download-links a').attr('download', "");
        });
    </script>
    @endif
    </body>
    </html>
