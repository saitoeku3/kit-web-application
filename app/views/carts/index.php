<div class="container" style="margin-top: 32px;">
  <h2 style="margin-bottom: 32px;">カート</h2>
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
          <label for="">個数:</label>
          <input type="number" name="number" value="0">
        </div>
        <div style="width: 20%;">
          <form action="/kit-web-application/carts/<? echo $product['order_histories_id'] ?>" method="post">
            <input class="btn btn-danger" type="submit" value="削除" />
          </form>
        </div>
    </div>
    <? } ?>
  </div>
  <? if (count($products) != 0) { ?>
    <button type="button" class="btn btn-primary" style="width: 200px; margin-top: 32px;">注文</button>
  <? } else { ?>
    <p>カートは空です。</p>
  <? } ?>
</div>
