<?
class RegistrationController {
  public function signin() {
    $title = "ログイン";
    $body = file_get_contents(__DIR__ . '/../views/registrations/signin.php');
    echo template($title, $body);
  }

  public function signup() {
    $title = "新規登録";
    $body = file_get_contents(__DIR__ . '/../views/registrations/signup.php');
    echo template($title, $body);
  }

  public function signout() {
  }
}
