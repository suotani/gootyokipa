@extends("layouts.base")

@section("main")
<h1>あたらしくつくろう！</h1>
@if(count($errors) > 0)
  <ul>
    @foreach($errors->all() as $error)
      <div class="alert alert-warning" role="alert">{{$error}}</div>
    @endforeach
  </ul>
@endif
<div class="container">
  <form action={{route("store_products")}} method="post" class="create-form" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label>たいとる</label>
      <input type="text" name="title" class="form-control" value="{{old('title', '')}}">
    </div>

    <div class="form-group">
      <label>つくったひとのおなまえ</label>
      <input type="text" name="name" class="form-control" value="{{old('name', '')}}">
    </div>

    <div class="flex form-group">
      <input type="hidden" name="hands" id="hands">
      <div class="hand-input">
        <label>ひだりて</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="left" value="ぐー">
          <label class="form-check-label pointer">
            <img src="/images/goo.png" width="50px">
            ぐー　
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="left" value="ちょき">
          <label class="form-check-label pointer">
            <img src="/images/tyoki.png" width="50px">ちょき
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="left" value="ぱー">
          <label class="form-check-label pointer">
            <img src="/images/pa.png" width="50px">
            ぱー　
          </label>
        </div>
      </div>

      <div class="hand-input">
        <label>みぎて</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="right" value="ぐー">
          <label class="form-check-label pointer">
            <img src="/images/goo.png" width="50px">
            ぐー　
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="right" value="ちょき">
          <label class="form-check-label pointer">
            <img src="/images/tyoki.png" width="50px">ちょき
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="right" value="ぱー">
          <label class="form-check-label pointer">
            <img src="/images/pa.png" width="50px">
            ぱー　
          </label>
        </div>
      </div>
    </div>
    
    <div class="form-group">
      <input type="file" name="image" class="form-control-file" id="fileupload" style="display: none">
      <button type="button" class="btn btn-outline-success" onclick="$('#fileupload').click()" id="upload-btn">
        しゃしん
      </button>
    </div>
    
    <a href="{{route('products')}}" class="btn btn-secondary">もどる</a>
    <button type="submit" class="btn btn-primary">おっけー</button>
  </form>
</div>
<script>
$(function() {
  $('#upload-btn').after('<div id="uploadedImage"></div>');

  // アップロードするファイルを選択
  $('input[type=file]').change(function() {
    var file = $(this).prop('files')[0];

    // 画像以外は処理を停止
    if (! file.type.match('image.*')) {
      // クリア
      $(this).val('');
      $('#uploadedImage').html('');
      return;
    }

    // 画像表示
    var reader = new FileReader();
    reader.onload = function() {
      var img_src = $('<img>').attr('src', reader.result);
      $('#uploadedImage').html(img_src);
    }
    reader.readAsDataURL(file);
  });

  $(".form-check-input").change(function(){
    let right = $("input[name=right]:checked").val();
    let left = $("input[name=left]:checked").val();
    let hands =  left + ","+ right;
    $("#hands").val(hands);
  });

  $(".form-check-label").click(function(){
    $(this).prev().click();
  })


});
</script>

@endsection