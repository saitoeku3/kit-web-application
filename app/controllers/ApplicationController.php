<?
require __DIR__ . "/../views/index.php";
require_once dirname(__FILE__) . "/../../db/connect.php";

class ApplicationController {
  protected function connect_db() {
    return connect_db();
  }
  protected function is_logged_in() {
    if(!isset($_SESSION)){
      session_start();
    }
    if(!isset($_SESSION['id'])) {
      header('Location: http://192.168.64.2/kit-web-application/');
      exit;
    }
  }
}
