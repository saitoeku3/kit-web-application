<?
require dirname(__FILE__) . '/../models/User.php';

class RegistrationController {
  public function signin() {
    $title = "ログイン";
    $body = __DIR__ . '/../views/registrations/signin.php';
    echo template($title, $body);
  }

  public function signup() {
    $title = "新規登録";
    $body = __DIR__ . '/../views/registrations/signup.php';
    echo template($title, $body);
  }

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

    if ($_POST['password'] != $_POST['password_re']) {
      header('Location: http://192.168.64.2/kit-web-application/signup', true, 302);
      echo "パスワードが異なります。";
      exit();
    }

    $params = array(
      'name'     => $_POST['lastname'] . ' ' . $_POST['firstname'],
      'email'    => $_POST['email'],
      'password' => $_POST['password'],
      'zip_code' => $_POST['zip_code'],
      'address'  => $_POST['address']
    );

    $user = new User($params);
    $user->save();
    echo $user->created_at;
    header('Location: http://192.168.64.2/kit-web-application/', true, 302);
    exit();
  }

  public function signout() {
  }
}
