<?
class CartController {
  public function index() {
    $title = "カート";
    $body = file_get_contents(__DIR__ . '/../views/carts/index.php');
    echo template($title, $body);
  }
}
