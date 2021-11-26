{!! Theme::partial('header') !!}


 <div class="inner-banner wow fadeIn animated">
	<img src="{{ route('public.index') }}/storage/pages/inner-banner.jpg" class="w-100" alt="">
    <div class="banner-header">
    	<h1>Contact Us</h1>
        <div class="breadcrumb-area">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
         </ol>
        </div>
    </div>
</div>


<div class="inner-container conact-page">
	<div class="container">
      <div class="row">
      <div class="col-lg-5 col-sm-12 wow fadeInLeft animated">
        	<div>
            	<h3>Quick Contact</h3>
                <p>If you have any questions simply use the following contact details.</p>
                <ul class="contatlist">
                	<li><i class="fas fa-map-marker-alt"></i><strong>ADDRESS</strong>1 Tuas Bay Closed #06-01<br>LINER @ TUAS Singapore 636997</li>
                    <li><i class="fas fa-envelope"></i><strong>EMAIL</strong><a href="mailto:info@theblacktaurus.com">info@theblacktaurus.com</a></li>
                    <li><i class="fas fa-phone-alt"></i><strong>PHONE</strong><a href="callto:(65) 6339 1187">(65) 6339 1187</a> <br> <a href="callto:(65) 6339 1187">(65) 6339 1187</a></li>
                </ul>
            </div>
        </div>
    	<div class="col-lg-7 col-sm-12 align-self-center formdv wow fadeInRight animated">
        	<div>
            <h3>Send Us Message </h3>
            <p>We're here to help and answer any question you might have. We look forward to hearing from you.</p>
                <form name="frm_cntct" id="frm_cntct" method="post" action="" onSubmit="return false;">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control form-control-lg" name="name" placeholder="Your Name*">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="email" class="form-control form-control-lg" name="email" placeholder="Your Email Id*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control form-control-lg" name="phone" placeholder="Phone*">
                    </div>
                    <div class="form-group col-md-6">
                      <input type="subject" class="form-control form-control-lg" name="subject" placeholder="Subject*">
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea rows="4" class="form-control form-control-lg" name="message" placeholder="Your Message"></textarea>
                  </div>
                  <button type="submit" class="btn btn-lg btn-dark btn-block" id="submit_button">Submit</button>
                </form>
                <div id="message_sent" class="text-center text-danger d-block mt-3"></div>

            </div>
        </div>
    </div>

      <div class="maparea mt-xl-5 wow fadeInUp animated">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127638.61668700216!2d103.75639715415147!3d1.3524942736142458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1767b42b8ec9%3A0x400f7acaedaa420!2sSingapore!5e0!3m2!1sen!2sin!4v1637476515563!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

      </div>

	</div>
</div>
{!! Theme::partial('footer') !!}
