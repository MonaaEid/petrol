@extends('master')
@section('main-content')

<div class="container-fluid screenFiller">
<div class="mona">
<h2>products</h2>
<table class="table table-striped table-dark t">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">product name</th>
      <th scope="col">stock</th>
      

    </tr>
  </thead>
  <tbody>
  	 @foreach($gallery as $gall)

    <tr>
      <th scope="row"></th>
      <td>{{$gall->id}}</td>
      <td>{{$gall->product_name}}</td>
     
      <td>{{$gall->stock_no}}</td>
      
     <td><button class="btn btn-danger"><a href="/deleter/{{$gall->id}}" style="color: white">Delete</a></button></td>


  	 <td><button class="btn btn-warning"><a href="/editer/{{$gall->id}}" style="color: white">Edit</a></button></td>

    </tr>
   @endforeach
  </tbody>
</table>

</div>
</div>

<div class="blog">
<div class="row">
  <div class="col-12">
      <ul class="pagination justify-content-center">
          @if($gallery->currentPage() > 1)
            <li class="page-item "><a class="page-link" href="{{$gallery->previousPageUrl()}}">Previous</a></li>
          @endif
            <li class="page-item">{{ $gallery->links() }}</li>
          @if($gallery->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{$gallery->nextPageUrl()}}">Next</a></li>
          @endif
      </ul> 
  </div>
 </div>
</div>
@endsection
