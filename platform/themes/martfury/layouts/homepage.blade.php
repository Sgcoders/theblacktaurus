{!! Theme::partial('header') !!}

<div id="homepage-1">
    {!! do_shortcode('[simple-slider key="home-slider"][/simple-slider]') !!}
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
        <a href="{{URL::to('#flashSales')}}"><img src="{{ URL::to('/') }}/storage/pages/flash-sale.jpg" class="w-100" alt="" /></a>
    </div>
    {!! Theme::content() !!}
    @include(Theme::getThemeNamespace('views.ecommerce.products'), array('products' => app(Botble\Ecommerce\Services\Products\GetProductService::class)->getProduct1()))

    <div class="container">
        <div class="ad-video-area">
            <div class="row no-gutters">
                <div class="col-md-6 offset-md-3 col-sm-12">
                    <div><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><img src="{{ URL::to('/') }}/storage/pages/video-img.jpg" class="w-100"></a></div>
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
                                <div class="col-md-12"><img src="{{ URL::to('/') }}/storage/pages/customer.jpg" class=""></div>
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
                                <div class="col-md-12"><img src="{{ URL::to('/') }}/storage/pages/customer.jpg" class=""></div>
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
                                <div class="col-md-12"><img src="{{ URL::to('/') }}/storage/pages/customer.jpg" class=""></div>
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
