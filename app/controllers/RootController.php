<?
require_once dirname(__FILE__) . "/./ApplicationController.php";

class RootController extends ApplicationController{
  public function index() {
    $title = "トップ";
    $body = __DIR__ . '/../views/root/index.php';
    echo view($title, $body);
  }
}
