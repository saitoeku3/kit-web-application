<?
class CartController {
  public function index() {
    $title = "カート";
    $body = __DIR__ . '/../views/carts/index.php';
    echo template($title, $body);
  }
}
