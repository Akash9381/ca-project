@extends('frontend.layouts.frontend_layouts')
@section('title','Contact-Us | Tax Mall')
<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@section('content')
    <section id="contact" class="contact-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <div class="bar"></div>

            </div>
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="contact-form">
                        <form id="formcontact" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control"
                                            required data-error="Please enter your name" placeholder="Your Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control"
                                            required data-error="Please enter your email" placeholder="Your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" required
                                            data-error="Please enter your number" class="form-control"
                                            placeholder="Your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                            required data-error="Please enter your subject" placeholder="Your Subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="6" required
                                            data-error="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" class="default-btn">
                                            Send Message
                                            <span></span>
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="default-shape">
          <div class="shape-1">
              <img src="{{asset('frontend/assets/img/shape/1.png')}}" alt="image">
          </div>
          <div class="shape-2 rotateme">
              <img src="{{asset('frontend/assets/img/shape/2.png')}}" alt="image">
          </div>
          <div class="shape-3">
              <img src="{{asset('frontend/assets/img/shape/3.svg')}}" alt="image">
          </div>
          <div class="shape-4">
              <img src="{{asset('frontend/assets/img/shape/4.svg')}}" alt="image">
          </div>
          <div class="shape-5">
              <img src="{{asset('frontend/assets/img/shape/5.png')}}" alt="image">
          </div>
      </div>
    </section>

@endsection

@section('js')
<script>
    (function ($) {
    "use strict";
    $("#formcontact")
        .validator()
        .on("submit", function (event) {
            if (event.isDefaultPrevented()) {
                formError();
                submitMSG(false, "Did you fill in the form properly?");
            } else {
                event.preventDefault();
                submitForm();
            }
        });
    function submitForm() {
        var name = $("#name").val();
        var email = $("#email").val();
        var msg_subject = $("#msg_subject").val();
        var phone_number = $("#phone_number").val();
        var message = $("#message").val();
        $.ajax({
            type: "POST",
            url: "/contactform/",
            data:{name:name,email:email,subject:msg_subject,number:phone_number,message:message,_token:"{{ csrf_token() }}"},
            success: function (text) {
                if (text == "success") {
                    formSuccess();
                } else {
                    formError();
                    submitMSG(false, text);
                }
            },
        });
    }
    function formSuccess() {
        $("#formcontact")[0].reset();
        submitMSG(true, "Message Submitted!");
    }
    function formError() {
        $("#formcontact")
            .removeClass()
            .addClass("shake animated")
            .one(
                "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
                function () {
                    $(this).removeClass();
                }
            );
    }
    function submitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h4 text-left tada animated text-success";
        } else {
            var msgClasses = "h4 text-left text-danger";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
})(jQuery);

</script>
@endsection

