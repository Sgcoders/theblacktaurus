<form name="frm_cntct" id="frm_cntct" method="post" action="{{route('public.send-contact-email')}}">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control form-control-lg" name="name" placeholder="Your Name*" required>
        </div>
        <div class="form-group col-md-6">
            <input type="email" class="form-control form-control-lg" name="email" placeholder="Your Email Id*" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control form-control-lg" name="phone" placeholder="Phone*" required>
        </div>
        <div class="form-group col-md-6">
            <input type="subject" class="form-control form-control-lg" name="subject" placeholder="Subject*" required>
        </div>
    </div>
    <div class="form-group">
        <textarea rows="4" class="form-control form-control-lg" name="message" placeholder="Your Message" required></textarea>
    </div>
    <button type="submit" class="btn btn-lg btn-dark btn-block" id="submit_button">Submit</button>
</form>
<div id="message_sent" class="text-center text-danger d-block mt-3"></div>
