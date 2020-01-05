<?
require_once dirname(__FILE__) . "/../../db/connect.php";

class ApplicationModel {
  protected function connect_db() {
    return connect_db();
  }
}
