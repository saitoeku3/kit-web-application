<?
require dirname(__FILE__) . "/../../db/connect.php";

class ApplicationModel {
  protected $db;

  public function __construct() {
    $this->db = connect_db();
  }
}
