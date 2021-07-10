@extends('master')

@section('main-content')
<div class="contact wow fadeInUp">
    <div class="container ">
         <div class="section-header text-center">
                        <p>Get In Touch</p>
                        <h2 style="font-family:Monadi">اضافة منتج للمعرض</h2>
         </div>
    <div class="col-md-6 container"><!--  i edit here -->
    <div class="contact-form">
    <div id="success"></div>
        <form name="sentMessage" action="/add" method="POST" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="control-group">
                <input type="text" name="product_name" class="form-control" id="name" placeholder="اسم المنتج" required="required" data-validation-required-message="Please enter your name" />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <input type="email" name="stock_no" class="form-control" id="email" placeholder="العدد" required="required" data-validation-required-message="Please enter your email" />
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