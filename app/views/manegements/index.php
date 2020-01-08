<div class="container" style="margin-top: 32px;">
  <h2 style="margin-bottom: 32px;">管理画面</h2>
  <a class="btn btn-primary" style="margin-bottom: 32px;" href="/kit-web-application/manegements/new" role="button">
    商品を追加
  </a>
  <div
    style="
    display: grid;
    margin-bottom: 64px;
    column-gap: 56px;
    grid-template-rows: auto;
    grid-template-columns: repeat(auto-fill, 17vw);
    row-gap: 48px;
    width: 100%;"
  >
    <? foreach ($products as $product) { ?>
      <div class="card" style="width: 17vw; color: #212529;">
        <img src="<?= $product['image_url'] ?>" class="card-img-top" alt="<?= $product['name'] ?>" />
        <div class="card-body">
          <h5 class="card-title"><?= $product['name'] ?></h5>
          <p class="card-text"><?= $product['price'] ?>円</p>
          <p class="card-text"><?= $product['description'] ?></p>
        </div>
        <form
          action="/kit-web-application/products/<?= $product['id'] ?>/delete"
          method="post"
          style="width: 100%; display: flex; margin-bottom: 24px;">
          <input
            class="nav-link"
            type="submit"
            value="削除"
            style="color: #fff; background-color: red; border: none; border-radius: 6px; margin: auto;">
        </form>
      </div>
    <? } ?>
  </div>
</div>
