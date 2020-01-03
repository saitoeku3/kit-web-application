<?
require_once dirname(__FILE__) . '/../models/User.php';

class SessionsController {
  public function new() {
    $title = "ログイン";
    $body = __DIR__ . '/../views/sessions/new.php';
    echo template($title, $body);
  }

  // sign_in
  public function create() {
    session_start();
  }

  // sign_out
  public function destroy() {
    session_destroy();
  }
}
