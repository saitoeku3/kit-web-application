<?
class RegistrationController {
  public function signin() {
  }

  public function signup() {
    $title = "新規登録";
    $body = file_get_contents(__DIR__ . '/../views/registrations/signup.php');
    echo template($title, $body);
  }

  public function signout() {
  }
}
