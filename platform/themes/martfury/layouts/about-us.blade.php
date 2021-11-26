{!! Theme::partial('header') !!}


<div class="inner-banner wow fadeIn animated">
    <img src="{{ route('public.index') }}/storage/pages/inner-banner.jpg" class="w-100" alt="">
    <div class="banner-header">
        <h1>About Us</h1>
        <div class="breadcrumb-area">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </div>
    </div>
</div>


<div class="inner-container pb-xl-5 mb-xl-5">
    <div class="container">

        <div class="row">
            <div class="col-md-7 wow fadeInLeft animated">
                <h4>Company Profile</h4>
                <h2>Know About <span>Taurus</span></h2>
                <p><strong>FT Global is one of Singapore’s leading
                    distributors of fresh egg, soft drink and drinking
                    water trading.</strong></p>
                <p>Our customers range from local
                    bakeries, restaurants and hotels to larger
                    customers such as super markets, large scale
                    bakeries and Institutions. We are located in a
                    modern facility in Western Singapore close to
                    major highways allowing us to provide same day
                    or next day service and delivery to our island wide
                    customers.
                    We strive to meet all of our customers needs
                    while offering the most affordable prices.
                    Contact us today to see how we can offer our
                    services to grow your business!
                    2018, we successfully launched the very first
                    bags of Black Taurus Salted Egg Fish Skin Crisps.
                    From that very first day, though, a single
                    philosophy has guided us, use only the freshest,
                    all-natural ingredients to create intensely
                    flavored, wonderfully craveable snacks you can
                    feel good about eating.
                    Over the years, we’ve carefully added new flavors
                    and even expanded our line to include Taurus
                    Salted Egg Potato Chips and Taurus Salmon Skin
                    Crisps, Cereal Crispy Fish Skin widening our
                    product range to suit various consumer needs
                    and taste.</p>
            </div>
            <div class="col-md-5 wow fadeInRight animated">
                <img src="{{ route('public.index') }}/storage/pages/about.jpg" class="w-100">
            </div>
        </div>
    </div>
</div>

<div class="cert-area">
    <div class="container">
        <h2 class="text-center pt-xl-5 crheding wow fadeInUp animated">Certificates</h2>
        <div class="row mt-xl-5">
            <div class="col-md-4 wow fadeInUp animated">
                <div><a href="{{ route('public.index') }}/storage/pages/cer-1.jpg" class="fancybox" data-fancybox="certificate"><img src="{{ route('public.index') }}/storage/pages/cer-1.jpg"
                                                                                                  class="img-fluid d-block mx-auto"><span>Inspection Test Report</span></a>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp animated">
                <div><a href="{{ route('public.index') }}/storage/pages/cer-1.jpg" class="fancybox" data-fancybox="certificate"><img src="{{ route('public.index') }}/storage/pages/cer-1.jpg"
                                                                                                  class="img-fluid d-block mx-auto"><span>Certificate if Analysis</span></a>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp animated">
                <div><a href="{{ route('public.index') }}/storage/pages/cer-2.jpg" class="fancybox" data-fancybox="certificate"><img src="{{ route('public.index') }}/storage/pages/cer-2.jpg"
                                                                                                  class="img-fluid d-block mx-auto"><span>Registration Certificate</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Theme::partial('footer') !!}
