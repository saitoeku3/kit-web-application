<div class="wrapper">
    <div class="list-group" id="category-box">
        <div class="list-group-item" style="background-color: #f5f5f5;text-align:center">ジャンル一覧</div>
        <? foreach ($categorys as $category) { ?>
          <form id="search-form"action="/kit-web-application/search" method="get">
            <input type="hidden" name="tag" value=<? echo $category ?> >
            <input type="submit" class="list-group-item" value=<? echo $category ?> style="width:200px;">
          </form>
        <? } ?>
    </div>
    <img src="<?= $product['image_url'] ?>" class="product-img" alt="<?= $product['name'] ?>">
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
