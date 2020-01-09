<?
require_once __DIR__ . "/./ApplicationController.php";
require_once __DIR__ . "/../models/OrderHistory.php";
require_once __DIR__ . "/../models/Product.php";
require_once __DIR__ . "/../models/User.php";

class ManegementsController extends ApplicationController {
  public function index() {
    $this->confirm_if_admin();

    $reg_result;
    $queries;
    $current_tab = 'products';
    $orders = array();
    $products = array();
    $users = array();

    preg_match('/\?tab=.+$/', $_SERVER["REQUEST_URI"], $reg_result);
    if (array_key_exists(0, $reg_result)) {
      parse_str($reg_result[0], $queries);
      $current_tab = $queries['?tab'];
    }

    switch ($current_tab) {
      case 'products':
        $products = Product::all();
      break;
      case 'users':
        $users = User::all_normal_users();
      break;
      case 'orders':
        $orders = OrderHistory::all_parchaed();
      default:
        break;
    }

    $title = "管理画面";
    $body = __DIR__ . '/../views/manegements/index.php';
    $data = array(
      'products' => $products,
      'users' => $users,
      'orders' => $orders,
      'current_tab' => $current_tab
    );
    echo view($title, $body, $data);
  }

  public function new() {
    $this->confirm_if_admin();

    $title = '商品を追加';
    $body = __DIR__ . '/../views/manegements/new.php';
    $data = array();
    echo view($title, $body, $data);
  }

  private function confirm_if_admin() {
    Parent::is_logged_in();
    if (!$_SESSION['is_admin']) {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/kit-web-application/', true, 302);
      exit();
    }
  }
}
