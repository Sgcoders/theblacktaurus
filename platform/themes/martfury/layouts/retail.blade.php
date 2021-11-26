{!! Theme::partial('header') !!}


<div class="inner-banner wow fadeIn animated">
    <img src="{{ route('public.index') }}/storage/pages/inner-banner.jpg" class="w-100" alt="">
    <div class="banner-header">
        <h1>Our Retail</h1>
        <div class="breadcrumb-area">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our Retail</li>
            </ol>
        </div>
    </div>
</div>


<div class="inner-container pb-xl-5 mb-xl-5">
    <div class="container retailarea-area">


        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                SINGAPORE - Song Fish <i class="fas fa-angle-down"></i>
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <div class="companylist">
                                        <h5>Chinatown Point #B1-26</h5>
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i>133 New Bridge Road,<br>Singapore
                                                059413
                                            </li>
                                            <li><i class="fas fa-phone-alt"></i>+65 6694 8066</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <div class="companylist">
                                        <h5>JEM, #B1-43/44</h5>
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i>50 Jurong Gateway Road,<br>Singapore
                                                608549
                                            </li>
                                            <li><i class="fas fa-phone-alt"></i>+65 6262 2811</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <div class="companylist">
                                        <h5>Century Square, #B1-08</h5>
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i>2 Tampines Central 5,<br>Singapore
                                                529509
                                            </li>
                                            <li><i class="fas fa-phone-alt"></i>+65 6260 1868</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <div class="companylist">
                                        <h5>Oasis Terraces, #01-09/10/11</h5>
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i>681 Punggol Drive, <br>Singapore
                                                820681
                                            </li>
                                            <li><i class="fas fa-phone-alt"></i>+65 6244 8098</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <div class="companylist">
                                        <h5>Viva Business Park, #01-09</h5>
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i>Blk 750 Chai Chee Road,<br>Singapore
                                                469000
                                            </li>
                                            <li><i class="fas fa-phone-alt"></i>+65 6636 0154</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-4">
                                    <div class="companylist">
                                        <h5>The Star Vista, #01-18</h5>
                                        <ul>
                                            <li><i class="fas fa-map-marker-alt"></i>1 Vista Exchange Green, <br>Singapore
                                                138617
                                            </li>
                                            <li><i class="fas fa-phone-alt"></i> +65 6694 5822</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                JAPAN HOME <i class="fas fa-angle-down"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Theme::partial('footer') !!}
