<?
require_once dirname(__FILE__) . "/./ApplicationController.php";
require_once dirname(__FILE__) . '/../models/User.php';

class SessionsController extends ApplicationController {
  public function new() {
    $title = "ログイン";
    $body = __DIR__ . '/../views/sessions/new.php';
    echo template($title, $body);
  }

  // sign_in
  public function create() {
    if (
      !isset($_POST['lastname']) || $_POST['lastname'] === '' ||
      !isset($_POST['firstname']) || $_POST['firstname'] === '' ||
      !isset($_POST['email']) || $_POST['email'] === '' ||
      !isset($_POST['password']) || $_POST['password'] === '' ||
      !isset($_POST['password_re']) || $_POST['password_re'] === '' ||
      !isset($_POST['zip_code']) || $_POST['zip_code'] === '' ||
      !isset($_POST['address']) || $_POST['address'] === ''
    ) {
      header('Location: http://192.168.64.2/kit-web-application/signup', true, 302);
      exit();
    }

    session_start();
  }

  // sign_out
  public function destroy() {
    session_destroy();
  }

  private function authentication($email, $password) {
    $db = parent::connect_db();
    
  }
}
