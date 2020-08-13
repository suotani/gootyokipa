@extends("layouts.base")
@section("main")
<h1>みんなのさくひん</h1>
<a class="btn btn-info" href={{route("create_products")}}>とうこう</a>
<div class="main">
  <div class="products">
  @foreach($products as $product)
    <div class="card" style="width: 18rem;">
    <img src="{{$product->path}}" class="card-img-top" alt="..."　width="300px" height="300px">
      <div class="card-body">
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  @endforeach
  </div>
</div>


@endsection