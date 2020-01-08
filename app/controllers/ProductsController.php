<?
require_once dirname(__FILE__) . "/./ApplicationController.php";
require_once dirname(__FILE__) . "/../models/Product.php";
class ProductsController {
  public function show() {
      $title = "カート";
      $body = __DIR__ . '/../views/products/show.php';
      $keys = parse_url($_SERVER["REQUEST_URI"]); //パース処理
      $path = explode("/", $keys['path']); //分割処理
      $last = end($path); //最後の要素を取得
      $product = Product::find_by_id($last);
      $categorys = Product::get_category();
      $data = array('product' => $product[0],'categorys' => $categorys[0]);
      echo view($title, $body, $data);
  }
}
