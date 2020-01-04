<?
require_once dirname(__FILE__) . "/./ApplicationModel.php";

class Product extends ApplicationModel {
  public function __construct() {
    parent::__construct();
  }

  public function find_by_name($name) {
    try {
      $db = parent::connect_db();
      $sth = $db->prepare('SELECT * from products WHERE name LIKE :name');
      $sth->bindValue(':name', "%$name%", PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch (PDOException $e) {
      die('Error:' . $e->getMessage());
    }
  }
}
