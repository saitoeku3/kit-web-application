<?
require_once dirname(__FILE__) . "/./ApplicationController.php";
require_once dirname(__FILE__) . '/../models/User.php';

class ProfileController extends ApplicationController{
  public function index() {
    Parent::is_logged_in();
    $user = User::find_by_id($_SESSION['id'])[0];

    $title = "トップ";
    $body = __DIR__ . '/../views/profile/index.php';
    $data = array('user' => $user);
    echo view($title, $body, $data);
  }
}
