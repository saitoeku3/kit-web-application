<div class="container" style="margin-top: 32px;">
  <h2 style="margin-bottom: 32px;">「<? echo $word ?>」の検索結果</h2>
  <ul>
    <? foreach ($products as $product) { ?>
      <li><? echo $product['name'] ?></li>
    <? } ?>
  </ul>
</div>
