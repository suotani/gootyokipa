@extends("layouts.base")
@section("main")
<h1>{{$product->title}}</h1>
<div class="show-song">
  <div class="card mb-3" style="max-width: 1000px;">
    <div class="row no-gutters">
      <div class="col-md-6">
        <img src="{{$product->path}}" class="card-img" alt="...">
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title">
            <img src="/images/{{$product->hand_code('left')}}.png">
            うたってみよう
            <img src="/images/{{$product->hand_code('right')}}.png">
          </h5>
          <p class="card-text">ぐーちょきぱーで、ぐーちょきぱーで、</p>
          <p class="card-text">なにつくろう、なにつくろう、</p>
          <p class="card-text">
            みぎては「{{$product->splited_hands("right")}}」で、
          </p>
          <p class="card-text">
            ひだりては「{{$product->splited_hands("left")}}」で、
          </p>
          <p class="card-text">
            {{$product->title}}~♪、{{$product->title}}~♪
          </p>
          <p class="card-text">
            <small class="text-muted">
              作者　{{$product->name}}
            </small>
          </p>
        </div>
      </div>
    </div>
  </div>
  <a href="{{route('products')}}" class="btn btn-secondary">もどる</a>
</div>

@endsection
