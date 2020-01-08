<div class="wrapper">
    <div class="list-group" id="junre-box">
        <div class="list-group-item" style="background-color: #f5f5f5">ジャンル一覧</div>
        <? foreach ($categorys as $category) { ?>
          <a href="#" class="list-group-item"><? echo $category ?></a>
        <? }?>
    </div>
    <img src="<?= $image_url ?>" class="product-img">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $product['name'] ?></h4>
            <p class="card-text">【価格】<?= $product['price'] ?>円</p>
            <p class="card-text">【商品説明】<br><?= $product['description'] ?></p>
            <form method="post" action="http://192.168.64.2/kit-web-application/carts">
                <input type="hidden" value=<?= $product['id'] ?> name="product_id">
                <button type="submit" class="btn btn-primary">購入する</button>
            </form>
        </div>
    </div>
</div>
