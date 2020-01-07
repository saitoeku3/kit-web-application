<?
if (!isset($_SESSION)) {
  session_start();
}
?>

<nav class="navbar navbar-dark bg-dark" style="display: flex; justify-content: space-between;">
  <a class="navbar-brand" href="/kit-web-application/" style="display: block;">KIT Web Application</a>
  <form id="search-form" style="display: flex; width: 50%;" action="/kit-web-application/search" method="get">
    <input class="form-control mr-sm-2" type="search" placeholder="キーワードを入力" name="q" aria-label="Search">
    <input class="btn btn-outline-success" type="submit" value="検索" style="width: 100px" />
  </form>
  <ul class="nav">
    <? if (isset($_SESSION['name'])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="/kit-web-application" style="color: #fff;">
          <? echo $_SESSION['name'] ?>
        </a>
      </li>
      <li class="nav-item">
        <form action="/kit-web-application/sign-out" method="post">
          <input class="nav-link" type="submit" value="ログアウト" style="color: #fff; background-color: transparent; border: none; ">
        </form>
      </li>
    <? } else { ?>
      <li class="nav-item">
        <a class="nav-link" href="/kit-web-application/sign-up" style="color: #fff;">
          新規登録
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/kit-web-application/sign-in" style="color: #fff;">
          ログイン
        </a>
      </li>
    <? } ?>
    <? if (isset($_SESSION['name'])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="/kit-web-application/carts" style="color: #fff;">
          カート
          <i class="fas fa-shopping-cart"></i>
        </a>
      </li>
    <? } ?>
  </ul>
</nav>

<script src="/kit-web-application/app/views/layouts/header.js"></script>
