<div class="container" style="margin-top: 32px;">
  <h1 style="border-bottom: 1px solid #e1e4e8;">お届け内容の確認</h2>
  <? if (count($products) == 0) { ?>
    <p>注文するものがありません。</p>
  <? } else { ?>
　<div style="display: flex; flex-direction:row; justify-content: space-between;">
    <div>
      <h2>お届け先</h2>
　    <p>〒<? echo $user['zip_code']?> 住所: <? echo $user['address']?></p>
      <h2>注文内容</h2>
      <? foreach ($products as $product) { ?>
        <div style="border: 1px solid #ddd; width: 100%; padding: 12px; display: flex; justify-content: space-between;">
        <img
          src="<? echo $product['image_url'] ?>"
          width="200px"
          height="200px"
          style="margin-right: auto;"
          alt="">
          <div style="width: 60%;">
            <h4><? echo $product['name'] ?></h4>
            <div>単価:<? echo $product['price'] ?>円</div>
            <div>合計金額:<? echo $product['price'] * $product['quantity'] ?>円</div>
            <label for="">個数:<? echo $product['quantity'] ?></label>
          </div>
      </div>
      <? } ?>
    </div>
    <div class="card">
      <div class="card-body">
        <p class="card-text">小計:   <? echo $total_price?>円</p>
        <p class="card-text">送料:   0円</p>
        <p class="card-text">合計:   <? echo $total_price?>円</p>
        <form method="POST" action="/kit-web-application/orders">
          <button type="submit" class="btn btn-primary">注文を確定する</button>
        </form>
      </div>
    </div>
  </div>
　<? } ?>
</div>
