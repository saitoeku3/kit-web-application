<?
require_once dirname(__FILE__) . "/./ApplicationController.php";
class ProductsController {
  public function show() {
      $title = "カート";
      $body = __DIR__ . '/../views/products/show.php';
      echo view($title, $body);
  }
}
