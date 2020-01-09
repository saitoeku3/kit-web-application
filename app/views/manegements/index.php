<div class="container" style="margin-top: 32px;">
  <h2 style="margin-bottom: 32px;">管理画面</h2>
  <ul class="nav nav-tabs" style="margin-bottom: 32px;">
    <li class="nav-item">
      <a class="nav-link" href="http://<?= $_SERVER['HTTP_HOST'] ?>/kit-web-application/manegements?tab=products">商品管理</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://<?= $_SERVER['HTTP_HOST'] ?>/kit-web-application/manegements?tab=users">ユーザー管理</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://<?= $_SERVER['HTTP_HOST'] ?>/kit-web-application/manegements?tab=orders">注文管理</a>
    </li>
  </ul>
  <? if ($current_tab == 'products') { ?>
    <a class="btn btn-primary" style="margin-bottom: 32px;" href="/kit-web-application/manegements/new" role="button">
      商品を追加
    </a>
    <div
      style="
      display: grid;
      margin-bottom: 64px;
      column-gap: 56px;
      grid-template-rows: auto;
      grid-template-columns: repeat(auto-fill, 17vw);
      row-gap: 48px;
      width: 100%;"
    >
      <? foreach ($products as $product) { ?>
        <div class="card" style="width: 17vw; color: #212529;">
          <img src="<?= $product['image_url'] ?>" class="card-img-top" alt="<?= $product['name'] ?>" />
          <div class="card-body">
            <h5 class="card-title"><?= $product['name'] ?></h5>
            <p class="card-text"><?= $product['price'] ?>円</p>
            <p class="card-text"><?= $product['description'] ?></p>
          </div>
          <form
            action="/kit-web-application/products/<?= $product['id'] ?>/delete"
            method="post"
            style="width: 100%; display: flex; margin-bottom: 24px;">
            <input
              class="nav-link"
              type="submit"
              value="削除"
              style="color: #fff; background-color: red; border: none; border-radius: 6px; margin: auto;">
          </form>
        </div>
      <? } ?>
    </div>
    <? if (count($products) == 0) { ?>
      <p>商品が存在しません。</p>
    <? } ?>
  <? } ?>
  <? if ($current_tab == 'users') { ?>
    <ul class="list-group">
    <? foreach ($users as $user) { ?>
      <li class="list-group-item" style="display: flex; justify-content: space-between;">
        <div style="margin: auto 0;"><?= $user['name'] ?></div>
        <form action="/kit-web-application/users/<?= $user['id'] ?>/delete" method="post">
          <input class="btn btn-danger" type="submit" value="削除" />
        </form>
      </li>
    <? } ?>
    </ul>
    <? if (count($users) == 0) { ?>
      <p>ユーザーが存在しません。</p>
    <? } ?>
  <? } ?>
  <? if ($current_tab == 'orders') { ?>
    <ul class="list-group">
    <? foreach ($orders as $order) { ?>
      <li class="list-group-item" style="display: flex; justify-content: space-between;">
        <div style="margin: auto 0;"><?= $order['product_name'] ?></div>
        <div style="margin: auto 0;"><?= $order['user_name'] ?></div>
        <form action="/kit-web-application/orders/<?= $order['id'] ?>/delete" method="post">
          <input class="btn btn-danger" type="submit" value="削除" />
        </form>
      </li>
    <? } ?>
    </ul>
    <? if (count($orders) == 0) { ?>
      <p>注文が存在しません。</p>
    <? } ?>
  <? } ?>
</div>
