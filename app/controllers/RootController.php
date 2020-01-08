<?
require_once dirname(__FILE__) . "/./ApplicationController.php";
require_once dirname(__FILE__) . "/../models/Product.php";

class RootController extends ApplicationController{
  public function index() {
    $title = "トップ";
    $categorys = Product::get_category();
    $data = array('categorys' => $categorys);
    $body = __DIR__ . '/../views/root/index.php';
      
    echo view($title, $body,$data);
  }
}
