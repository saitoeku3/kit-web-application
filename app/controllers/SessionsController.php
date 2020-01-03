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
      header('Location: http://192.168.64.2/kit-web-application/sign-in', true, 302);
      exit();
    }
    session_start();
    $user = $this->authentication($_POST['email'], $_POST['password']);
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['name'];
    header('Location: http://192.168.64.2/kit-web-application', true, 302);
    exit();
  }

  // sign_out
  public function destroy() {
    session_destroy();
    header('Location: http://192.168.64.2/kit-web-application', true, 302);
    exit();
  }

  private function authentication($email, $password) {
    $db = parent::connect_db();
    $sth = $db->prepare('SELECT id, name, email FROM users WHERE email = :email AND password = :password');
    $sth->bindValue(':email',    $email,    PDO::PARAM_STR);
    $sth->bindValue(':password', $password, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return array(
      'id'    => $result['id'],
      'name'  => $result['name'],
      'email' => $result['email']
    );
  }
}
