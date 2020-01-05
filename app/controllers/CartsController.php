<?
require_once dirname(__FILE__) . "/./ApplicationController.php";

class CartsController extends ApplicationController {
  public function index() {
    $title = "カート";
    $body = __DIR__ . '/../views/carts/index.php';
    echo view($title, $body);
  }
}
