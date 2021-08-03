@extends('master')

@section('main-content')


<script>

  $(document).ready(function(){
      $('.dynamic').change(function(value){
          //alert('monaaaa');
          if($(this).val() != '') {
              let value = $(this).val();
              console.log(value);

              $.ajax({
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  method:'GET' ,
                  url:'/price' ,
                  data:{value: value} ,
                  dataType:'json' ,//return data will be json
                  success: function (op) {
                      $("#price0").val(op);
                      // console.log(data.op);
                      // console.log(op);
                      // alert('hello');
                  }
              });
          }



      });


    let counter=1;
    $('#add').on("click",function(){
      $('#addHere').append("<div></div>");
      $('#addHere div:last').attr({
        class:"form-group form-inline mb-2",
        id:"div"+counter,
      });
      //append
      $('#addHere div:last').append(`
        <select class="aya form-control " ></select>
        <input value="1" type="number" min="1" class="form-control">
        <input type="text" class="form-control mo">
        <input type="button" class="rem  btn-danger" value=" x " >
      <br>
`);
      $('#addHere #div'+counter+' select').attr({'name':'product[]','id':'dynamic'+counter,'onchange':'fun(this)'});
      $('#addHere #div'+counter+' input:nth-child(2)').attr({'id':'quantity'+counter,'onchange':'fun2(this)' ,'name':'quantity[]'});
      $('#addHere #div'+counter+' input:nth-child(3)').attr('id','price'+counter);
      $('#addHere #div'+counter+' input:nth-child(4)').attr('id','rem'+counter);

      $('#addHere #div'+counter+' select').append('<option disabled selected>choose</option>');
      @foreach($gallery as $gall)
        $('#addHere #div'+counter+' select').append('<option></option>');
        $('#addHere #div'+counter+' select option:last').attr( 'value','{{$gall->id}}');
        $('#addHere #div'+counter+' select option:last').text('{{$gall->product_name}}');
        // $('#addHere #div'+counter+' input:nth-child(2)').attr('max','{{$gall->stock_no}}');
      @endforeach



          counter++;


    });
  });

  $(document).on('click', '.rem', function(){
        $(this).closest('div').remove();
      });

      function fun(index){
  // let inputID=index.parentNode.childNodes[5].id;
  let productID=index.value;
  // console.log(selectID);
  $.ajax({
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  method:'GET' ,
                  url:"{{route ('priceTwo')}}" ,
                  data:{productID: productID} ,
                  // dataType:'json' ,//return data will be json
                  success: function (op) {
                        index.parentNode.childNodes[5].value=op;
                      //   let total=0;
                      //  let sum =parseInt(op);
                      //  total+=sum;
                        // $( "#total" ).append(total);
                  }
              });
}
// let sum = op+op;
// console.log(sum);
function fun2(index){
  // let inputID=index.parentNode.childNodes[5].id;
  // let selectID=index.value;
  let quantity=index.value;
  let productID=index.parentNode.childNodes[1].value;
  // console.log(quantity,dishID);
  $.ajax({
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  method:'GET' ,
                  url:"{{route ('totalPriceUpdate')}}" ,
                  data:{quantity: quantity, productID: productID} ,
                  // dataType:'json' ,//return data will be json
                  success: function (price) {
                        index.parentNode.childNodes[5].value=price;
                        // $('.totalPrice').val(totalPrice.response)
                  }
              });
}

</script>

<div class=" wow fadeInUp">

                    {{-- @if(Session::has('status'))
                        <p class="alert alert-info">{{ Session::get('status') }}</p>
                    @endif --}}

    <div v class="col-md-6 container contact-form">
      <div class="section-header text-center">
        <h1 ><center>Gallery Order</center></h1>
            @if(Session::has('status'))
            <p class="alert alert-info">{{ Session::get('status') }}</p>
             
            @endif
           
           
      </div>
    <div class="card-body contact-form " >
    
              <form action="/storeOrder" method="post">
                      @csrf
                      <div class="form-group row">
                        <div class="col-md-12">
                          <h6 name="time" style="color:#17a2b8">{{carbon\carbon::now()}}</h6>
                        </div>
                      </div>  
                      @if ($errors->any())
                      <ul class="alert alert-danger">
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                              @endforeach
                      </ul>
              
                  @endif
                      
                      <div class="form-group row">
                        <div class="col-md-12">
                             <span>insert date</span>
                            <input type="date" name="date"  class="btn btn-outline-dark">
                            {{-- <span>add items </span> --}}
                        </div>
                      </div>
                      
                      {{-- <div class="form-group row">
                        <div class="col-md-12"> --}}
                          <span>add items </span>
                            <input type="button" class="btn btn-outline-dark " id="add" value="add">
                        {{-- </div>
                      </div> --}}

                  <div class="form-group row form-inline mb-2">
                      <span style="margin: 30px" class="form-control"> المنتج  </span>
                      <input value="العدد" type="text" min="1" class="form-control" disabled>
                      <input value="السعر" type="text" class="form-control mo" disabled>
                  </div>
                    
                      <div id="addHere"></div>
                        {{-- <span id="total"></span> --}}

                        <div class="form-group row">
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block" style="background-color:rgb(131, 125, 125)"
                            >Order Now</button>
                          </div>
                        </div>
              </form>
              <button type="button"  class="btn btn-warning" onclick="window.location='{{ URL::previous() }}'">Cancel</button>

        </div>
</div>
    



@endsection
