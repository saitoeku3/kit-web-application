<?
require_once __DIR__ . "/./ApplicationController.php";
require_once __DIR__ . "/../models/Product.php";

class ManegementsController extends ApplicationController {
  public function index() {
    $this->confirm_if_admin();

    $products = Product::all();

    $title = "管理画面";
    $body = __DIR__ . '/../views/manegements/index.php';
    $data = array('products' => $products);
    echo view($title, $body, $data);
  }

  public function new() {
    $this->confirm_if_admin();

    $title = '商品を追加';
    $body = __DIR__ . '/../views/manegements/new.php';
    $data = array();
    echo view($title, $body, $data);
  }

  private function confirm_if_admin() {
    Parent::is_logged_in();
    if (!$_SESSION['is_admin']) {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/kit-web-application/', true, 302);
      exit();
    }
  }
}
