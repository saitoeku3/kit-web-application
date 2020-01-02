<?
require dirname(__FILE__) . "/../views/_template.php";

class RootController {
  public function index() {
    $title = "index";
    $body = file_get_contents(__DIR__ . '/../views/index.php');
    echo template($title, $body);
  }
}
