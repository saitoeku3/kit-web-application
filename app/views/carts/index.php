<div class="container" style="margin-top: 32px;">
  <div style="display: flex; flex-direction:row; justify-content: space-between;">
    <h2>カート</h2>
    <? if (count($products) != 0) { ?>
    <button type="button" class="btn btn-primary" style="width: 200px; margin-bottom: 32px;">注文</button>
    <? } ?>
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
        <div style="width: 50%;">
          <h3><? echo $product['name'] ?></h3>
          <div><? echo $product['price'] ?></div>
          <label for="">個数:<? echo $product['quantity'] ?></label>
          <form method="POST" action="/kit-web-application/orders/edit">
            <input type="hidden" name="product_id" value=<?= $product['product_id'] ?> >
            <input type="number" name="quantity" value="1" min="1" max="100">
            <button type="submit" class="btn btn-primary">変更</button>
          </form>
        </div>
        <div style="width: 20%;">
          <form action="/kit-web-application/carts/<? echo $product['order_histories_id'] ?>" method="post">
            <input class="btn btn-danger" type="submit" value="削除" />
          </form>
        </div>
    </div>
    <? } ?>
  </div>
  <? if (count($products) == 0) { ?>
    <p>カートは空です。</p>
  <? } ?>
</div>
