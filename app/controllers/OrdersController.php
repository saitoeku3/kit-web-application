<?
require_once __DIR__ . "/./ApplicationController.php";
require_once __DIR__ . "/../models/OrderHistory.php";

class OrdersController extends ApplicationController {
  public function index() {
  }
  public function new() {
      
  }
  public function create() {
  }
  public function edit() {
    if(!isset($_SESSION)){
      session_start();
    }
    $quantity = $_POST['quantity'];
    $product_id = $_POST['product_id'];
    OrderHistory::edit_product_quantity($quantity,$product_id);
    header('Location: http://192.168.64.2/kit-web-application/carts');
    exit;
  }
}
