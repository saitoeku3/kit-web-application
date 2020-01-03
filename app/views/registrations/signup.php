<h2 style="margin-bottom: 32px;">新規登録</h2>
<form action="/kit-web-application/signup" method="post">
  <div class="form-group">
    <label style="margin: auto 0;">氏名</label>
    <div style="display: flex; justify-content: space-between; width: 100%;">
      <input type="text" name="lastname" class="form-control" style="width: 48%;" placeholder="姓">
      <input type="text" name="firstname" class="form-control" style="width: 48%;" placeholder="名">
    </div>
  </div>
  <div class="form-group">
    <label style="margin: auto 0;">メールアドレス</label>
    <input type="text" name="email" class="form-control">
  </div>
  <div class="form-group">
    <label style="margin: auto 0;">パスワード</label>
    <input type="password" name="password" class="form-control">
  </div>
  <div class="form-group">
  <label style="margin: auto 0;">パスワード (再入力)</label>
    <input type="password" name="password_re" class="form-control">
  </div>
  <div class="form-group">
    <label style="margin: auto 0;">郵便番号</label>
    <input type="text" name="zip_code" class="form-control">
  </div>
  <div class="form-group">
    <label style="margin: auto 0;">住所</label>
    <input type="text" name="address" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">登録</button>
</form>
