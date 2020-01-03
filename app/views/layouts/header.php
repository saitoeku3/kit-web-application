<nav class="navbar navbar-dark bg-dark" style="display: flex; justify-content: space-between;">
  <a class="navbar-brand" href="/kit-web-application/" style="display: block;">KIT Web Application</a>
  <form style="display: flex; width: 50%;">
    <input class="form-control mr-sm-2" type="search" placeholder="キーワードを入力" aria-label="Search">
    <input class="btn btn-outline-success" type="submit" value="検索" style="width: 100px" />
  </form>
  <ul class="nav">
    <?
    session_start();
    if (isset($_SESSION['name'])) {
      echo '
        <li class="nav-item">
          <a class="nav-link" href="/kit-web-application" style="color: #fff;">
            '.$_SESSION['name'].'
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/kit-web-application/sign-out" style="color: #fff;">
            ログアウト
          </a>
        </li>
      ';
    } else {
      echo '
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
      ';
    }
    ?>
    <li class="nav-item">
      <a class="nav-link" href="/kit-web-application/carts" style="color: #fff;">
        カート
        <i class="fas fa-shopping-cart"></i>
      </a>
    </li>
  </ul>
</nav>
