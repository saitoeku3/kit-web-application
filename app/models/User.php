<?
require_once dirname(__FILE__) . "/./ApplicationModel.php";

class User extends ApplicationModel {
  public $id;
  public $name;
  public $email;
  private $password;
  public $zip_code;
  public $address;
  public $created_at;

  public function __construct($params) {
    $this->name = $params['name'];
    $this->email = $params['email'];
    $this->password = password_hash($params['password'], PASSWORD_BCRYPT);
    $this->zip_code = $params['zip_code'];
    $this->address = $params['address'];
  }

  public function save() {
    try {
      $db = parent::connect_db();
      $insert_sth = $db->prepare(
        'INSERT INTO users (name, email, password, zip_code, address) VALUES (:name, :email, :password, :zip_code, :address)'
      );
      $insert_sth->bindValue(':name',     $this->name,     PDO::PARAM_STR);
      $insert_sth->bindValue(':email',    $this->email,    PDO::PARAM_STR);
      $insert_sth->bindValue(':password', $this->password, PDO::PARAM_STR);
      $insert_sth->bindValue(':zip_code', $this->zip_code, PDO::PARAM_STR);
      $insert_sth->bindValue(':address',  $this->address,  PDO::PARAM_STR);
      $insert_sth->execute();
      $this->id = $db->lastInsertId();

      $select_sth = $db->query("SELECT created_at FROM users WHERE id = $this->id");
      $select_result = $select_sth->fetch(PDO::FETCH_ASSOC);
      $this->created_at = $select_result['created_at'];
    } catch (PDOException $e) {
      die('Error:' . $e->getMessage());
    }
  }
}
