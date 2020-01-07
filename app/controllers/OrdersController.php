<?
require_once __DIR__ . "/./ApplicationController.php";
require_once __DIR__ . "/../models/OrderHistory.php";
require_once __DIR__ . "/../models/User.php";

class OrdersController extends ApplicationController {
  public function index() {
      $products = array();

      Parent::is_logged_in();
      
      if (isset($_SESSION['id'])) {
        $products = OrderHistory::find_parchased_products_by_user_id($_SESSION['id']);
      }

      $title = "注文履歴";
      $body = __DIR__ . '/../views/orders/index.php';
      $data = array('products' => $products);
      echo view($title, $body, $data);
  }
    
  public function new() {
      $products = array();
      $user = array();
      Parent::is_logged_in();

      if (isset($_SESSION['id'])) {
        $products = OrderHistory::find_cart_products_by_user_id($_SESSION['id']);
        $user = User::find_by_id($_SESSION['id']);
      }
      $data = array('products' => $products,'user' => $user[0], 'total_price' => self::price_calculation($products));
      $title = "注文内容確認";
      $body = __DIR__ . '/../views/orders/new.php';
      echo view($title, $body,$data);
  }
    
  public function create() {
      
      Parent::is_logged_in();
      
      if (isset($_SESSION['id'])) {
        OrderHistory::give_order();
      }
      header('Location: http://192.168.64.2/kit-web-application/orders');
      exit;
  }
  public function edit() {
    
    Parent::is_logged_in();
    $quantity = $_POST['quantity'];
    $product_id = $_POST['product_id'];
    OrderHistory::edit_product_quantity($quantity,$product_id);
    header('Location: http://192.168.64.2/kit-web-application/carts');
    exit;
  }
  public function price_calculation($products){
      $total_price = 0;
      foreach ($products as $product) {
          $total_price += $product['price'] * $product['quantity'];
      }
      return $total_price;
  }
}
