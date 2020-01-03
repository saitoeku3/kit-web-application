<?
require_once dirname(__FILE__) . "/./ApplicationController.php";

class RootController extends ApplicationController{
  public function index() {
    $title = "トップ";
    $body = __DIR__ . '/../views/index.php';
    echo template($title, $body);
  }
}
