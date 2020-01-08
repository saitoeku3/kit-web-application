<div class="wrapper">
    <div class="list-group" id="junre-box">
        <div class="list-group-item" style="background-color: #f5f5f5">ジャンル一覧</div>
        <a href="#" class="list-group-item">スポーツ</a>
        <a href="#" class="list-group-item">食べ物</a>
        <a href="#" class="list-group-item">漫画</a>
        <a href="#" class="list-group-item">旅行</a>
    </div>
    <img src="<?= $image_url ?>" class="product-img">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $name ?></h4>
            <p class="card-text">【価格】<?= $price ?>円</p>
            <p class="card-text">【商品説明】<br><?= $description ?></p>
            <form method="post" action="http://192.168.64.2/kit-web-application/carts">
                <input type="hidden" value=<?= $id ?> name="product_id">
                <button type="submit" class="btn btn-primary">購入する</button>
            </form>
        </div>
    </div>
</div>
