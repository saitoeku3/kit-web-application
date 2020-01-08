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
<div class="container" style="margin-top: 32px;border-top: 1px solid #ddd;padding:12px;">
  <? if (!$is_reviewed) { ?>
    <form action="/kit-web-application/reviews" method="POST">
      <input type="hidden" name="product_id" value=<? echo $product['id'] ?> >
      <textarea rows="5" cols="50" name="comment" placeholder="商品の感想を記入してください" style="display:block;"></textarea>
      <div class="evaluation">
        <input id="star1" type="radio" name="rate" value="5" />
        <label for="star1"><span class="text">最高</span>★</label>
        <input id="star2" type="radio" name="rate" value="4" />
        <label for="star2"><span class="text">良い</span>★</label>
        <input id="star3" type="radio" name="rate" checked="checked" value="3" />
        <label for="star3"><span class="text">普通</span>★</label>
        <input id="star4" type="radio" name="rate" value="2" />
        <label for="star4"><span class="text">悪い</span>★</label>
        <input id="star5" type="radio" name="rate" value="1" />
        <label for="star5"><span class="text">最悪</span>★</label>
      </div>
      <input type="submit" class="btn btn-primary" value="投稿する">
    </form>
  <? } else { ?>
    <p>投稿済み</p>
  <?}?>
  <? if (count($reviews) == 0) { ?>
    <p>レビューはまだありません。</p>
  <? } else { ?>
    <h4>平均評価<? echo $rate_average ?></h4>
    <? foreach ($reviews as $review) { ?>
      <div class="card" style="width:100%;">
        <div class="card-body">
          <h4 class="card-title">ユーザー名:<?= $review['name'] ?></h4>
          <p class="card-text">評価:<span style="color:#ffcc00;">★</span><?= $review['rate'] ?></p>
          <p class="card-text"><?= $review['comment'] ?></p>
        </div>
      </div>
    <? } ?>
  <? } ?>
</div>
