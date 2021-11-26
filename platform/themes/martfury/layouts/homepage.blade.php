{!! Theme::partial('header') !!}

<div id="homepage-1">
    <div class="indx-slider">
        <div id="heroBanner" class="justify-cntent-center align-items-center">
            <div id="bannerCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="{{ route('public.index') }}/storage/sliders/slider-1.jpg" alt="" class="img-fluid d-block mx-auto"></div>
                        <div class="carousel-container first-carousel-content">
                            <div class="carousel-content">
                                <h2 class="animated fadeInDown"><small>YES WE HAVE</small><br>BEST
                                    <span>POTATO CHIPS</span>
                                </h2>
                                <p class="animated fadeInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                    elit,<br>sed diam nonummy nibh euismod.</p>
                                <div class="bannerbtn-area">
                                    <a href="javascript:void(0);" class="btn-service animated fadeIn scrollto">ORDER
                                        NOW</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-background"><img src="{{ route('public.index') }}/storage/sliders/slider-2.jpg" alt="" class="img-fluid d-block mx-auto"></div>
                        <div class="carousel-container second-carousel-content">
                            <div class="carousel-content">
                                <h2 class="animated fadeInDown"><small>YES WE HAVE</small><br>BEST
                                    <span>POTATO CHIPS</span>
                                </h2>
                                <p class="animated fadeInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                    elit,<br>sed diam nonummy nibh euismod.</p>
                                <div class="bannerbtn-area">
                                    <a href="javascript:void(0);" class="btn-service animated fadeIn scrollto">ORDER
                                        NOW</a>

                                </div>
                            </div>
                        </div>
                    </div>


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


    <div class="container">
        <div class="ad-video-area">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div><a href=""><img src="{{ route('public.index') }}/storage/pages/ad.jpg" class="w-100"></a></div>
                </div>
                <div class="col-md-6">
                    <div><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><img src="{{ route('public.index') }}/storage/pages/video-img.jpg" class="w-100"></a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/nTLY6ibdRh4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="flash-sale wow  fadeInUp animated">
        <a href="#"><img src="{{ route('public.index') }}/storage/pages/flash-sale.jpg" class="w-100" alt="" /></a>
    </div>
    {!! Theme::content() !!}
    @include(Theme::getThemeNamespace('views.ecommerce.products'), array('products' => app(Botble\Ecommerce\Services\Products\GetProductService::class)->getProduct1()))
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
                                <div class="col-md-12"><img src="{{ route('public.index') }}/storage/pages/customer.jpg" class=""></div>
                                <div class="col-md-12">
                                    <small><strong>Siddharth Jain</strong><br>Bunglow Owner</small>
                                    <span><i class="fas fa-quote-left"></i>I am highly impressed by the quality portfolio of the properties that Taurus had to offer me, this made my choice a lot easier.<i class="fas fa-quote-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="speak-content">
                            <div class="row justify-content-md-center">
                                <div class="col-md-12"><img src="{{ route('public.index') }}/storage/pages/customer.jpg" class=""></div>
                                <div class="col-md-12">
                                    <small><strong>Ranjit Mullick</strong><br>Apartment Owner</small>
                                    <span><i class="fas fa-quote-left"></i>The Taurus team understood my requirements very well and offered me the ideal apartment for my family's needs.<i class="fas fa-quote-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="speak-content">
                            <div class="row justify-content-md-center">
                                <div class="col-md-12"><img src="{{ route('public.index') }}/storage/pages/customer.jpg" class=""></div>
                                <div class="col-md-12">
                                    <small><strong>Ajay Daga</strong><br>&nbsp;</small>
                                    <span><i class="fas fa-quote-left"></i>I compliment the team for the prompt and active response. I would highly recommend it to all my friends and family.<i class="fas fa-quote-right"></i></span>
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