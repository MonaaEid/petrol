@extends('master')
@section('main-content')
{{-- <script>
     function fun(index){
  // let inputID=index.parentNode.childNodes[5].id;
//   let productID=index.value;
  let date=index.parentNode.childNodes[1].value ;


//   console.log(date);
  $.ajax({
                  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                  method:'GET' ,
                  url:"{{route ('fetch-sales')}}" ,
                  data:{date: date} ,
                  // dataType:'json' ,//return data will be json
                  success: function () {
                      $('#monsh').load('/fetch-sales');
                    // console.log(gallery_sales);
                        // index.parentNode.childNodes[5].value=op;
                      //   let total=0;
                      //  let sum =parseInt(op);
                      //  total+=sum;
                        // $( "#total" ).append(total);
                  }
              });
}
</script> --}}
{{-- <div class="contact wow fadeInUp">
    <div class="container">
        <div class="section-header text-center">
            <p>Get In Touch</p>
            <h2>For Any Query</h2>
        </div>
        <div class="row">
            <div class="col-md-6 container">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="flaticon-address"></i>
                        <div class="contact-text">
                            <h2>Location</h2>
                            <p>123 Street, New York, USA</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="flaticon-call"></i>
                        <div class="contact-text">
                            <h2>Phone</h2>
                            <p>+012 345 67890</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="flaticon-send-mail"></i>
                        <div class="contact-text">
                            <h2>Email</h2>
                            <p>info@example.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div> --}}
   
            <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Contact Us</h2>
                        </div>
                      
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Get In Touch</p>
                        <h2>For Any Query</h2>
                        
                        <div class="contact-form col-md-6">
                            <div id="success"></div>
                            <form  id="contactForm" method="GET" action="fetch-sales">
                                <div class="control-group">
                                
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group" id='fff'>
                                    <input type="date" id="foo" class="form-control" name="date" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                  <button class="btn" value="sumbit">اختيار</button>
                                </div>
                            </form>
                        </div>  
                        
                       
                    </div>
                    {{-- @if(!empty($gallery_sales)) --}}
                    <div class="row" id='monsh'>

                    </div>
                </div>
            </div>
            <!-- Contact End -->

@endsection            