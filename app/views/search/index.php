<div class="container" style="margin-top: 32px;">
  <h2 style="margin-bottom: 32px;">「<? echo $word ?>」の検索結果</h2>
  <div
    style="
    display: grid;
    column-gap: 56px;
    grid-template-rows: auto;
    grid-template-columns: repeat(auto-fill, 17vw);
    row-gap: 48px;
    width: 100%;"
  >
    <? foreach ($products as $product) { ?>
      <div class="card" style="width: 17vw;">
        <img src="<? echo $product['image_url'] ?>" class="card-img-top" alt="<? echo $product['name'] ?>" />
        <div class="card-body">
          <h5 class="card-title"><? echo $product['name'] ?></h5>
          <p class="card-text"><? echo $product['price'] ?>円</p>
          <p class="card-text"><? echo $product['description'] ?></p>
        </div>
      </div>
    <? } ?>
  </div>
</div>
