@extends('master')
@section('main-content')


<div class="container-fluid screenFiller">
{{-- <div class=""> --}}
    <div class="section-header text-center">
        <h2>Gallery Pricing</h2>
    </div>
<table class="table table-striped table-dark t">
  <thead>
    <tr>
      {{-- <th scope="col">#</th> --}}
      <th scope="col">id</th>
      <th scope="col">product name</th>
      <th scope="col">purchase price</th>
      <th scope="col">sale price</th>
      <th scope="col">date</th>
      <th scope="col">commission </th>
      
      

    </tr>
  </thead>
  <tbody>
  	 @foreach($gallery_pricing as $item)

    <tr>
      {{-- <th scope="row"></th> --}}
      <td>{{$item->id}}</td>
      <td>{{$item->product_name}}</td>
      <td>{{$item->purchase_price}}</td>
      <td>{{$item->sale_price}}</td>
      <td>{{$item->date}}</td>
      <td>{{$item->commission}}</td>
      
     <td><button class="btn btn-danger"><a href="/gallery-pricing-deleter/{{$item->id}}" style="color: white">Delete</a></button></td>


  	 <td><button class="btn btn-warning"><a href="/gallery-pricing-editer/{{$item->id}}" style="color: white">Edit</a></button></td>

    </tr>
   @endforeach
  </tbody>
</table>

{{-- </div> --}}
</div>

<div class="blog">
<div class="row">
  <div class="col-12">
      <ul class="pagination justify-content-center">
          @if($gallery_pricing->currentPage() > 1)
            <li class="page-item "><a class="page-link" href="{{$gallery_pricing->previousPageUrl()}}">Previous</a></li>
          @endif
            <li class="page-item">{{ $gallery_pricing->links() }}</li>
          @if($gallery_pricing->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{$gallery_pricing->nextPageUrl()}}">Next</a></li>
          @endif
      </ul> 
  </div>
 </div>
</div>
{{-- {{ $gallery->links() }}  --}}
@endsection
