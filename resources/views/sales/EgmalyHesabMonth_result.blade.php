@extends('master')
@section('main-content')

<div class="contact wow fadeInUp">
  <div class="container ">
    <div class="section-header text-center">
      <h3>كشف اجمالي محاسبة شهر</h3>
    </div>

  <section class="card d-flex p-2 bd-highlight" >
    <div class="hstack gap-3">
      <dl class="row">
      
        <dt class="col-sm-2"></dt>
        <dd class="col-sm-2"></dd>
        <dd class="col-sm-3">قرش</dd>
        <dd class="col-sm-3">جنية</dd>
{{-- add the data here  --}}
        <dt class="col-sm-2">اجمالي مسحوبات السولار</dt>
        <dd class="col-sm-2"> لتر =</dd>
        <dd class="col-sm-3">20</dd>
        <dd class="col-sm-3">0.05</dd>

        <dt class="col-sm-2">اجمالي مسحوبات البنزين</dt>
        <dd class="col-sm-2"> لتر =</dd>
        <dd class="col-sm-3">22</dd>
        <dd class="col-sm-3">0.30</dd>
        

      </dl>
    </div>

</section>
  <section class="d-flex p-2 bd-highlight">
    {{-- DEBIT TABLE --}}
<table class="table  table-bordered" >
  <thead>
    <tr>
      <th scope="col" colspan="4">الجانب المدين</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">البيان</th>
      <td >قرش</td>
      <td>جنية</td>
    </tr>
    <tr class="align-bottom">
      <th scope="row">جملة المسحوبات</th>
      <td>50</td>
      <td>0.50</td>
    </tr>
    <tr class="align-bottom">
      <th scope="row">الضرائب</th>

      <td>50</td>
      <td>0.50</td>
    </tr>
    <tr>
      <th class="align-top" colspan="2" scope="row">الاجمالي</th>
      <td class="align-top" ></td>
    </tr>
    <tr>
      <th class="align-top" colspan="3" scope="row">زيادة المحاسبة</th>
    </tr>
  </tbody>
</table>
{{-- ////////////////////////////////////// --}}
{{-- CREDIT TABLE --}}
{{-- ////////////////////////////////////// --}}
<table class="table  table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan="4" >الجانب الدائن</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">البيان</th>
      <td >قرش</td>
      <td>جنية</td>
    </tr>
    <tr class="align-bottom">
      <th scope="row">جملة المسحوبات</th>
      <td>50</td>
      <td>0.50</td>
    </tr>
    <tr class="align-bottom">
      <th scope="row">الضرائب</th>

      <td>50</td>
      <td>0.50</td>
    </tr>
    <tr>
      <th class="align-top" colspan="2" scope="row">الاجمالي</th>
      <td class="align-top" ></td>
    </tr>
    <tr>
      <th class="align-top" colspan="3" scope="row">زيادة المحاسبة</th>
    </tr>
  </tbody>
</table>
</section>
</div>
  </div>
@endsection            
