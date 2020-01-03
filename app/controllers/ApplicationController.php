<?
require_once dirname(__FILE__) . "/../../db/connect.php";

class ApplicationController {
  protected function connect_db() {
    return connect_db();
  }
}
