@extends('master')
@section('main-content')

    <div class="contact wow fadeInUp">
      <div class="container ">
      <div class="section-header text-center">
        <h3>بيان اجمالى حساب  الشهر</h3>
      </div>
      <section class=" d-flex p-2 bd-highlight" >

    <table class="table table-bordered "  style="width:30%" >
      <thead class="thead-light">
        <tr>
          <th scope="col">التاريخ</th>
          <th scope="col">الوارد سولار</th>
          <th scope="col">الوارد ينزين</th>
          
        </tr>
      </thead>
  
      <tbody>
        @for ($i = 1; $i <= 31; $i++)
        <tr >
          <th scope="row">{{$i}}</th>
          @foreach($wared as $wared_elements)
          
          @if($wared_elements->oil_gas_id==3 && date("d",strtotime($wared_elements->date))==$i)
          <td>{{$wared_elements->coming}}</td>
          
          @endif
          @if($wared_elements->oil_gas_id==1 && date("d",strtotime($wared_elements->date))==$i)
          <td>{{$wared_elements->coming}}</td>
          
          @endif
        @endforeach
        </tr>
        @endfor
      </tbody>
    </table>
    
    <table class="table table-bordered" style="width:35%">
     <thead><th scope="row" colspan="3"><center>جملة النقدية</center> </th></thead> 

      <thead class="thead-light">
            
      <tr>
        <th scope="col">التاريخ </th>
        <th scope="col"> المبلغ</th>
        <th scope="col">ملاحظات</th>
   
      </tr>
      </thead>
        <tbody id="">
          @for ($i = 1; $i <= 31; $i++)
          <tr >
            <th scope="row">{{$i}}</th>
            @foreach($nakdia as $nakdia_elements)
                @if(date("d",strtotime($nakdia_elements->date))==$i)
                  <td>{{$nakdia_elements->payment}}</td>
                  <td>{{$nakdia_elements->notes}}</td>
                @endif
            @endforeach
          </tr>
          @endfor
        </tbody>
   
    </table>
    <table class="table table-bordered"  style="width:35%" >
      <thead> <th scope="row" colspan="4"><center>الحوافظ</center> </th></thead>
     

      <thead class="thead-light">
        <tr>
       
          <th scope="col">التاريخ</th>
          <th scope="col">رقم الحافظة</th>
          <th scope="col">مبلغ </th>
          <th scope="col">ملاحظات</th>
        </tr>
      </thead>
      
        <tbody id="">
          @for ($i = 1; $i <= 31; $i++)
          <tr >
            <th scope="row">{{$i}}</th>
            @if($hafza_payment_num >1)
            @foreach($hafza_payment as $hafza)
                @if(date("d",strtotime($hafza->date))==$i)
                  <td>{{$hafza->hafza_no}}</td>
                  <td>{{$hafza->payment}}</td>
                  <td>{{$hafza->notes}}</td>
                @endif
            @endforeach
            @else
              @if(date("d",strtotime($hafza_payment->date))==$i)
                  <td>{{$hafza_payment->hafza_no}}</td>
                  <td>{{$hafza_payment->payment}}</td>
                  <td>{{$hafza_payment->notes}}</td>
              @endif
            @endif
          </tr>
          @endfor
        </tbody> 
     
    </table>

      </section>
  </div>
  </div>
    
@endsection            
