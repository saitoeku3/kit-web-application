<div class="container" style="margin-top: 32px;">
  <h2 style="margin-bottom: 32px;">「<?= $word ?>」の検索結果</h2>
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
      <a
        class="card"
        style="width: 17vw; color: #212529;"
        href="/kit-web-application/products/<?= $product['id'] ?>">
        <img src="<?= $product['image_url'] ?>" class="card-img-top" alt="<?= $product['name'] ?>" />
        <div class="card-body">
          <h5 class="card-title"><?= $product['name'] ?></h5>
          <p class="card-text"><?= $product['price'] ?>円</p>
          <p class="card-text"><?= $product['description'] ?></p>
        </div>
      </a>
    <? } ?>
  </div>
</div>
