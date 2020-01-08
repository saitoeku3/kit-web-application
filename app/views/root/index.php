<div class="container" style="margin-top: 32px;">
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">伝えたいことを書くところ</h1>
      <p class="lead">
        ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
        ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
      </p>
    </div>
  </div>
  <h2 style="margin-bottom: 16px;">売れ筋の商品</h2>
  <div style="
    display: grid;
    margin-bottom: 64px;
    column-gap: 56px;
    grid-template-rows: auto;
    grid-template-columns: repeat(auto-fill, 17vw);
    row-gap: 48px;
    width: 100%;">
    <? foreach ($products as $product) { ?>
      <a class="card" style="width: 17vw; color: #212529;" href="/kit-web-application/products/<?= $product['id'] ?>">
        <img src="<?= $product['image_url'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $product['name'] ?></h5>
          <p class="card-text"><?= $product['description'] ?></p>
          <p class="card-text"><small class="text-muted"><?= $product['price'] ?>円</small></p>
        </div>
      </a>
    <? } ?>
  </div>
</div>
