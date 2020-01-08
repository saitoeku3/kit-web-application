<?
require_once dirname(__FILE__) . "/./ApplicationController.php";
require_once dirname(__FILE__) . '/../models/OrderHistory.php';

class RootController extends ApplicationController{
  public function index() {
    $popular_products = OrderHistory::find_sold_during_one_week();
    $products = array_slice($popular_products, 0, 3);

    $title = "トップ";
    $body = __DIR__ . '/../views/root/index.php';
    $data = array('products' => $products);
    echo view($title, $body, $data);
  }
}
