<?
require_once dirname(__FILE__) . "/./ApplicationController.php";
require_once dirname(__FILE__) . '/../models/User.php';

class SessionsController extends ApplicationController {
  public function new() {
    $title = "ログイン";
    $body = __DIR__ . '/../views/sessions/new.php';
    echo view($title, $body);
  }

  // sign_in
  public function create() {
    if (
      !isset($_POST['email']) || $_POST['email'] === '' ||
      !isset($_POST['password']) || $_POST['password'] === ''
    ) {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/kit-web-application/sign-in', true, 302);
      exit();
    }
    session_start();
    $user = $this->authentication($_POST['email'], $_POST['password']);
    $_SESSION['id']       = $user['id'];
    $_SESSION['name']     = $user['name'];
    $_SESSION['is_admin'] = $user['is_admin'];
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/kit-web-application', true, 302);
    exit();
  }

  // sign_out
  public function destroy() {
    session_start();
    $_SESSION = array();
    session_destroy();
    setcookie('PHPSESSID', '', time() -60);
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/kit-web-application', true, 302);
    exit();
  }

  private function authentication($email, $password) {
    $db = parent::connect_db();
    $sth = $db->prepare('SELECT id, name, is_admin, password FROM users WHERE email = :email');
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);

    if (password_verify($password, $result['password'])) {
      return array(
        'id'       => $result['id'],
        'name'     => $result['name'],
        'is_admin' => $result['is_admin']
      );
    } else {
      echo 'ログインに失敗しました。';
    }
  }
}
