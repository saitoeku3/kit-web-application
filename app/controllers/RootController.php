<?
class RootController {
  public function index() {
    $title = "トップ";
    $body = file_get_contents(__DIR__ . '/../views/index.php');
    echo template($title, $body);
  }
}
