{!! Theme::partial('header') !!}

<div id="homepage-1">
{!! do_shortcode('[simple-slider key="home-slider"][/simple-slider]') !!}
<!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog bd-example-modal-lg modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">

                        @if (env('APP_URL') != 'http://localhost:8000')
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/nTLY6ibdRh4"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="flash-sale wow  fadeInUp animated">
        <a href="{{URL::to('#flashSales')}}"><img src="{{ URL::to('/') }}/storage/pages/flash-sale.jpg" class="w-100"
                                                  alt=""/></a>
    </div>
    {!! Theme::content() !!}
    @include(Theme::getThemeNamespace('views.ecommerce.products'), array('products' => app(Botble\Ecommerce\Services\Products\GetProductService::class)->getProduct1()))

    <div class="container">
        <div class="ad-video-area">
            <div class="row no-gutters">
                <div class="col-md-6 offset-md-3 col-sm-12">
                    <div><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><img
                                src="{{ URL::to('/') }}/storage/pages/video-img.jpg" class="w-100"></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="testiminials-area wow fadeInUp animated" id="examples">
        <div class="container">


            <h2 class="main-heading mb-0 pb-0 wow fadeInUp animated">Our Reviews By Customers</h2>
            <p class="under-heading fadeInUp animated">We sincerely appreciate the trust shown by our customers and
                aspire to serve them well.</p>


            <div id="clientcarasuel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators">
                    <li data-target='#clientcarasuel' data-slide-to='0' class='active'>
                    <li data-target='#clientcarasuel' data-slide-to='1' class=''>
                    <li data-target='#clientcarasuel' data-slide-to='2' class=''>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="speak-content">
                            <div class="row justify-content-md-center">
                                <div class="col-md-12"><img src="{{ URL::to('/') }}/storage/pages/1-1.jpg" class="">
                                </div>
                                <div class="col-md-12">
                                    <small><strong>Gladys Heng</strong></small>
                                    <span><i class="fas fa-quote-left"></i>
                                        We fell in love with Black Taurus range of salted egg snacks! Their standard and quality is great!  Once we start munching we just can't stop and it will be gone before our home movie even reach half mark 😉<i
                                            class="fas fa-quote-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="speak-content">
                            <div class="row justify-content-md-center">
                                <div class="col-md-12"><img src="{{ URL::to('/') }}/storage/pages/2-1.jpg" class="">
                                </div>
                                <div class="col-md-12">
                                    <small><strong>Angeline Voon</strong></small>
                                    <span><i class="fas fa-quote-left"></i>Love the range from Black Taurus, simply addictive and delicious. Spoilt with choices and suitable for the whole family! Recommended to friends and they love it!<i
                                            class="fas fa-quote-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="speak-content">
                            <div class="row justify-content-md-center">
                                <div class="col-md-12"><img src="{{ URL::to('/') }}/storage/pages/3-1.jpg" class="">
                                </div>
                                <div class="col-md-12">
                                    <small><strong>Lee Sally</strong></small>
                                    <span><i class="fas fa-quote-left"></i>If you are a fan of crispy fish skin! Look no further and check out Black Taurus fish skin snacks! They are irresistible and crunchy in every bite!<i
                                            class="fas fa-quote-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var snackCarousel;
</script>
{!! Theme::partial('footer') !!}
