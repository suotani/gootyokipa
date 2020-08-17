@extends("layouts.base")
@section("main")
<h1>みんなのさくひん</h1>
<a class="btn btn-info" href={{route("create_products")}}>とうこう</a>
<div class="main">
  <div class="products">
  @foreach($products as $product)
    <div class="card">
    <img src="{{$product->path}}" class="card-img-top" alt="..."　width="30%" height="200px">
      <div class="card-body">
        <h5 class="card-title">{{$product->title}}</h5>
        <p>
          <img src="images/{{$product->hand_code('left')}}.png">
          <img src="images/{{$product->hand_code('right')}}.png">
        </p>
        <a href="{{route('product', $product)}}" class="btn btn-primary link_to_show">
          うたってみる
        </a>
      </div>
    </div>
  @endforeach
  </div>
</div>


@endsection