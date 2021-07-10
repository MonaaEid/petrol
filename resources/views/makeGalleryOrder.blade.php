
@extends('master')

@section('main-content')
<div class="contact wow fadeInUp">
    <div class="container ">
         <div class="section-header text-center">
                        <p>Get In Touch</p>
                        <h2>For Any Query</h2>
         </div>
    <div class="col-md-6 container"><!--  i edit here -->
    <div class="contact-form">
    <div id="success"></div>
        <form name="sentMessage"  action="/makeOrder" method="POST" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="control-group">
                <input type="text" name="product_name" class="form-control" id="name" placeholder="اكتب اسمك" required="required" data-validation-required-message="Please enter your name" />
                <p class="help-block text-danger"></p>
            </div>
        <div id="app">    
            <div class="control-group">
                
                    <input type="button" class="btn btn-outline-dark " id="add" @click="add" value="add">
                    <p class="help-block text-danger"></p>
            </div >
           
            <sales-template v-for="n in range" > </sales-template>
        </div>
      
            <div>
                <button class="btn" type="submit" id="sendMessageButton">ارسال</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<script type="text/x-template" id="sales-template">
    <div class="control-group" >
        <select class="form-control dynamic btn-secondary dropdown-toggle"   name="newProduct"  >
           
            <option value="" selected disabled >Choose</option>
            @foreach($gallery as $gall)
            <option value="{{$gall->id}}" > {{$gall->product_name}}
            </option>
            @endforeach
        </select>
     <input type="number">
     <button @click.prevent="removeItem(index)">remove</button>
   </div>
</script>

<!-- Contact End -->
<!-- Load vue. -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<!-- Load React. -->
  <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
  {{-- <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
  <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script> --}}
    <!-- Load our React component. -->
    {{-- <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script> --}}
    <script src="{{asset('js')}}/functions.js"></script>
@endsection

  