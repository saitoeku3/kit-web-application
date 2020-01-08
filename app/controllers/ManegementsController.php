<?
require_once __DIR__ . "/./ApplicationController.php";
require_once __DIR__ . "/../models/Product.php";

class ManegementsController extends ApplicationController {
  public function index() {
    $products = array();

    Parent::is_logged_in();
    if ($_SESSION['is_admin'])

    $title = "管理画面";
    $body = __DIR__ . '/../views/manegements/index.php';
    $data = array('products' => $products);
    echo view($title, $body, $data);
  }
}
