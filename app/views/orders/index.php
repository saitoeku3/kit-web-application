<div class="container" style="margin-top: 32px;">
  <div style="display: flex; flex-direction:row; justify-content: space-between;">
    <h2>注文履歴</h2>
  </div>
  <div>
    <? foreach ($products as $product) { ?>
      <div style="border: 1px solid #ddd; width: 100%; padding: 24px; display: flex; justify-content: space-between;">
      <img
        src="<? echo $product['image_url'] ?>"
        width="200px"
        height="200px"
        style="margin-right: auto;"
        alt="">
        <div style="width: 50%; margin: auto;">
          <h3><? echo $product['name'] ?></h3>
          <div>単価:<? echo $product['price'] ?>円</div>
          <div>合計価格:<? echo $product['quantity'] * $product['price'] ?>円</div>
          <div>個数:<? echo $product['quantity'] ?></div>
          <div>購入日:<? echo $product['created_at'] ?></div>
        </div>
    </div>
    <? } ?>
  </div>
  <? if (count($products) == 0) { ?>
    <p>まだ購入したことがありません。</p>
  <? } ?>
</div>

