<?
class RootController {
  public function index() {
    $title = "トップ";
    $body = __DIR__ . '/../views/index.php';
    echo template($title, $body);
  }
}
