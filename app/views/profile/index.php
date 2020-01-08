<div class="container" style="margin-top: 32px;">
  <h2 style="margin-bottom: 32px;">登録情報</h2>
  <div style="display: flex; margin-bottom: 32px;">
    <h3 style="width: 15vw">氏名</h3>
    <p style="font-size: 1.25rem; margin: auto;"><?= $user['name'] ?></p>
  </div>
  <div style="display: flex; margin-bottom: 32px;">
    <h3 style="width: 15vw">メールアドレス</h3>
    <p style="font-size: 1.25rem; margin: auto;"><?= $user['email'] ?></p>
  </div>
  <div style="display: flex; margin-bottom: 32px;">
    <h3 style="width: 15vw">郵便番号</h3>
    <p style="font-size: 1.25rem; margin: auto;"><?= $user['zip_code'] ?></p>
  </div>
  <div style="display: flex; margin-bottom: 32px;">
    <h3 style="width: 15vw">住所</h3>
    <p style="font-size: 1.25rem; margin: auto;"><?= $user['address'] ?></p>
  </div>
  <div style="display: flex; margin-bottom: 32px;">
    <h3 style="width: 15vw">登録日</h3>
    <p style="font-size: 1.25rem; margin: auto;"><?= $user['created_at'] ?></p>
  </div>
</div>
