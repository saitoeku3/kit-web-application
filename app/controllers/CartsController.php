<?
require_once __DIR__ . "/./ApplicationController.php";
require_once __DIR__ . "/../models/OrderHistory.php";

class CartsController extends ApplicationController {
  public function index() {
    $products = array();

    if(!isset($_SESSION)){
      session_start();
    }

    if (isset($_SESSION['id'])) {
      $products = OrderHistory::find_products_by_user_id($_SESSION['id']);
    }

    $title = "カート";
    $body = __DIR__ . '/../views/carts/index.php';
    $data = array('products' => $products);
    echo view($title, $body, $data);
  }

  public function destroy() {
    $reg_result;
    $queries;

    preg_match('/\d$/', $_SERVER["REQUEST_URI"], $reg_result);
    $id = $reg_result[0];
    OrderHistory::destroy($id);
    header('Location: http://'.$_SERVER['SERVER_NAME'].'/kit-web-application/carts', true, 302);
    exit();
  }
}
