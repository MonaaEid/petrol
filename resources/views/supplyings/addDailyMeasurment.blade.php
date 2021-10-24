@extends('master')
@section('main-content')

<div class="contact wow fadeInUp">
    <div class="container ">
         <div class="section-header text-center">
                        
                        <h2 style="font-family:Monadi">مقاسات دفتر اليومية</h2>
                        @if(Session::has('status'))
                        <p class="alert alert-info">{{ Session::get('status') }}</p>
                         
                        @endif
         </div>
    <div class="col-md-6 container"><!--  i edit here -->
    <div class="contact-form">
    <div id="success">
    </div>
        <form name="sentMessage" action="/storee" method="POST" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="control-group mb-2">
                    <label class="contact-text"><h6>التاريخ</h4> </label>   
                        <input type="date" value="2021-08-22" name="date" class="form-control" placeholder="" required="required"/>
                    <p class="help-block text-danger"></p>
            </div>
            
            <div class="control-group mb-2">
                <select  name="measurment_timing" class=" form-control" required="required" >
                    <option disabled selected>توقيت القياس</option>
                    @foreach($measuring_timing as $item)
                    <option class="form-control" value="{{$item}}">
                        {{$item}}
                    </option>
                    @endforeach
                </select>
                <p class="help-block text-danger"></p>
            </div>
            {{-- @foreach($pumps_type as $pump_type) --}}
           @foreach ($pumps_type as $name => $gas)
            <h3>{{$fuel[$name]->name}}</h3>
            <input type="text" name="gas_id[]" class="form-control" hidden value="{{$name}}" required  />

            @foreach($gas as $item)
            
            <div class="control-group ">
                <h5>{{$item->name}}</h5>
                <input type="text" name="fuel_id[]" class="form-control" hidden value="{{$item->oil_gas->id}}" required  />
                <input type="text" name="pump_id[]" class="form-control" hidden value="{{$item->id}}" required  />
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group  mb-2">
                <input type="text" name="measurment[]" class="form-control" placeholder="المقاس" required  />
                <p class="help-block text-danger"></p>
            </div>
            @endforeach
            <div class="control-group  mb-2">
                <input type="text" name="dafter[]" class="form-control" placeholder="الدفتر" required  />
                <p class="help-block text-danger"></p>
            </div>
            @endforeach

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
                <a href="/fuel-pricing-list">
                    <input type="button" class="btn-outline-dark btn" value="قائمة تسعير الوقود"/>
                </a>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<!-- Contact End -->
@endsection