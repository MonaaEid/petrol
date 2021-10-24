@extends('master')
@section('main-content')

<div class="contact wow fadeInUp">
    <div class="container ">
         <div class="section-header text-center">
                        
                        <h2 style="font-family:Monadi">ادخال قيمة نهاية الوردية</h2>
                        @if(Session::has('status'))
                        <p class="alert alert-info">{{ Session::get('status') }}</p>
                         
                        @endif
         </div>
    <div class="col-md-6 container"><!--  i edit here -->
    <div class="contact-form">
    <div id="success">
    </div>
        <form name="sentMessage" action="/store-shift_reading" method="POST" id="contactForm" novalidate="novalidate">
            @csrf
            @foreach($pumps as $pump)
            <h4>{{ $pump->name }}</h4>
	    <div class="control-group ">
	           <label class="contact-text" ><h6>بداية الوردية</h4> </label>
                    <input type="text" name="starting_shift{{$pump->id}}" id="starting_shift{{$pump->id}}" class="form-control" readonly value="{{$pumps_reading[$pump->id-1]->finished_shift_reading}}"  required="required" />
                    <p class="help-block text-danger"></p>
            </div>
	    <div class="control-group ">
	            <label class="contact-text"><h6>نهاية الوردية</h4> </label>
                    <input type="text" name="finishing_shift{{$pump->id}}" id="finishing_shift{{$pump->id}}" class="form-control"  placeholder="نهاية الوردية" required="required" />
                    <p class="help-block text-danger"></p>
            </div>
	    <div class="control-group ">
	            <label class="contact-text"><h6>المباع</h4> </label>
                    <input type="text" name="sold_out_value{{$pump->id}}" id="sold_out_value{{$pump->id}}" class="form-control"  readonly   required="required" />
                    <p class="help-block text-danger"></p>
            </div>
            @endforeach
            <div class=" control-group mb-2">
                <label class="contact-text"><h6>التاريخ</h4> </label>   
                    <input type="date" value="2021-08-22" name="date" class="form-control" placeholder="" required="required"/>
               
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
        </form>
    </div>
    </div>
</div>
</div>
<!-- Contact End -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $("#finishing_shift1").change(function(){
        var aya1=$('#finishing_shift1').val() - $('#starting_shift1').val();
        //alert(aya);
        $("#sold_out_value1").val(aya1);
    });
    $("#finishing_shift2").change(function(){
        var aya2=$('#finishing_shift2').val() - $('#starting_shift2').val();
        //alert(aya);
        $("#sold_out_value2").val(aya2);
    });
    $("#finishing_shift3").change(function(){
        var aya3=$('#finishing_shift3').val() - $('#starting_shift3').val();
        //alert(aya);
        $("#sold_out_value3").val(aya3);
    });
    $("#finishing_shift4").change(function(){
        var aya4=$('#finishing_shift4').val() - $('#starting_shift4').val();
        //alert(aya);
        $("#sold_out_value4").val(aya4);
    });
</script>
@endsection