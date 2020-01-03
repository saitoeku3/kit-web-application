<?
require_once dirname(__FILE__) . "/./ApplicationModel.php";

class User extends ApplicationModel {
  public $id;
  public $name;
  public $email;
  public $password;
  public $zip_code;
  public $address;
  public $created_at;

  public function __construct($user) {
    parent::__construct();
    $this->name = $user['name'];
    $this->email = $user['email'];
    $this->password = $user['password'];
    $this->zip_code = $user['zip_code'];
    $this->address = $user['address'];
  }

public function save() {
  try {
    $insert_sth = $this->db->prepare(
      'INSERT INTO users (name, email, password, zip_code, address) VALUES (:name, :email, :password, :zip_code, :address)'
    );
    $insert_sth->bindValue(':name',     $this->name,     PDO::PARAM_STR);
    $insert_sth->bindValue(':email',    $this->email,    PDO::PARAM_STR);
    $insert_sth->bindValue(':password', $this->password, PDO::PARAM_STR);
    $insert_sth->bindValue(':zip_code', $this->zip_code, PDO::PARAM_STR);
    $insert_sth->bindValue(':address',  $this->address,  PDO::PARAM_STR);
    $insert_sth->execute();
    $this->id = $this->db->lastInsertId();

    $select_sth = $this->db->query("SELECT created_at FROM users WHERE id = $this->id");
    $select_result = $select_sth->fetch(PDO::FETCH_ASSOC);
    $this->created_at = $select_result['created_at'];
    } catch (PDOException $e) {
      die('Error:' . $e->getMessage());
    }
  }
}
