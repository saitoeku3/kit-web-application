<div class="container" style="margin-top: 32px;">
  <h2 style="margin-bottom: 32px;">商品を追加</h2>
  <form action="/kit-web-application/products" method="post">
    <div class="form-group">
      <label style="margin: auto 0;">商品名</label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
      <label style="margin: auto 0;">概要</label>
      <input type="text" name="description" class="form-control">
    </div>
    <div class="form-group">
      <label style="margin: auto 0;">画像</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" accept="image/png, image/jpeg">
        <input id="image-input" type="hidden" name="image_url" value="">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
      <img id="preview" src"" height="200px" alt="プレビュー">
    </div>
    <div class="form-group">
      <label style="margin: auto 0;">価格</label>
      <input type="number" name="price" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">追加</button>
  </form>
</div>

<script src="/kit-web-application/app/views/manegements/new.js"></script>
