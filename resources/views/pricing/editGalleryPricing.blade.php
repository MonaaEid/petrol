@extends('master')
@section('main-content')
<style>
    .form-style-10 .inner-wrap{
	padding: 30px;
	background: #F8F8F8;
	border-radius: 6px;
	margin-bottom: 15px;
}

    }
</style>
<div class="contact wow fadeInUp">
    <div class="container ">
         <div class="section-header text-center">
                        
                        <h2 style="font-family:Monadi">اضافة تسعير لمنتجات المعرض</h2>
                        @if(Session::has('status'))
                        <p class="alert alert-info">{{ Session::get('status') }}</p>
                         
                        @endif
         </div>
    <div class="col-md-6 container"><!--  i edit here -->
    <div class="contact-form">
    <div id="success">
    </div>
        <form name="sentMessage" action="/store-gallery_pricing" method="POST" id="contactForm" novalidate="novalidate">
            @csrf
            <div class=" inner-wrap">
                    <label class="contact-text">التاريخ :  <input type="date" name="date" class="form-control" placeholder="" required="required" />
                    </label>
                    <p class="help-block text-danger"></p>
            </div>
            <div class="control-group mb-2">
                    <select  name="gallery_product" class=" form-control" required="required" >
                        <option class="form-control" value="{{$gallery_pricing->id}}">
                            {{$gallery_pricing->gallery_id}}
                        </option>
                    </select>
                    <p class="help-block text-danger"></p>
            </div>
            <div class="control-group ">
                    <input type="text" name="purchase_price" class="form-control"  placeholder="سعر الشراء" required="required" />
                    <p class="help-block text-danger"></p>
            </div>
            <div class="control-group ">
                <input type="text" name="sale_price" class="form-control"  placeholder="سعر البيع" required  />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group  mb-2">
                <input type="text" name="commission" class="form-control" placeholder="العمولة" required  />
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
            <br>
            <div class="control-group form-inline mb-2">
                <a href="/gallery-pricing-list">
                    <input type="button" class="btn-outline-dark btn" value="قائمة تسعير المعرض"/>
                </a>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<!-- Contact End -->
@endsection