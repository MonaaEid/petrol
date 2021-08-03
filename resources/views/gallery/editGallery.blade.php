@extends('master')

@section('main-content')
<div class="contact wow fadeInUp">
    <div class="container ">
         <div class="section-header text-center">
                        <p>Get In Touch</p>
                        <h2 style="font-family:Monadi">تعديل منتج {{$gallery->product_name}}</h2>
         </div>
    <div class="col-md-6 container"><!--  i edit here -->
    <div class="contact-form">
    <div id="success"></div>
        <form name="sentMessage" action="/editer/{{$gallery->id}}/update" method="POST" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="control-group">
                <input type="text" name="product_name" value="{{$gallery->product_name}}" class="form-control"  placeholder="اسم المنتج" required="required" />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <input type="number" name="stock_no" value="{{$gallery->stock_no}}" class="form-control" placeholder="العدد" required />
                <p class="help-block text-danger"></p>
            </div>
            @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>

    @endif
            <div>
                <button class="btn" type="submit" id="sendMessageButton">حفظ</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<!-- Contact End -->
@endsection