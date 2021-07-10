@extends('master')

@section('main-content')
<div class="contact wow fadeInUp">
    <div class="container ">
    <div class="col-md-6">
    <div class="contact-form">
    <div id="success"></div>
        <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
                <input type="text" class="form-control" id="name" placeholder="اكتب اسمك" required="required" data-validation-required-message="Please enter your name" />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                <p class="help-block text-danger"></p>
            </div>
            <div>
                <button class="btn" type="submit" id="sendMessageButton">ارسال</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<!-- Contact End -->
@endsection