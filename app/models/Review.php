<?
require_once dirname(__FILE__) . "/./ApplicationModel.php";

class Review extends ApplicationModel {
  public $id;
  public $product_id;
  public $user_id;
  public $rate;
  public $comment;
  public $created_at;

  public function __construct($params) {
    $this->product_id = $params['product_id'];
    $this->user_id = $params['user_id'];
    $this->rate = $params['rate'];
    $this->comment = $params['comment'];
  }
  public function find_by_product_id($product_id){
    try {
       $db = parent::connect_db();
       $sth = $db->prepare('
                           SELECT
                             reviews.id AS review_id, reviews.product_id, reviews.user_id,reviews.rate, reviews.comment, users.name
                           FROM
                             reviews INNER JOIN users ON reviews.user_id = users.id WHERE reviews.product_id = :product_id ORDER BY reviews.id DESC
                           ');
       $sth->bindValue(':product_id', $product_id, PDO::PARAM_INT);
       $sth->execute();
       $result = $sth->fetchAll(PDO::FETCH_ASSOC);
       return $result;
     } catch (PDOException $e) {
       die('Error:' . $e->getMessage());
    }
  }
  public function is_already_reviewed($product_id){
     try {
        $db = parent::connect_db();
        $sth = $db->prepare('
                            SELECT * FROM reviews WHERE user_id = :user_id AND product_id = :product_id
                            ');
        $sth->bindValue(':product_id', $product_id,     PDO::PARAM_INT);
        $sth->bindValue(':user_id',    $_SESSION['id'], PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return !empty($result[0]);
      } catch (PDOException $e) {
        die('Error:' . $e->getMessage());
     }
  }
  public function post_review($product_id,$rate,$comment) {
    if (isset($_SESSION['id'])) {
       try {
         $db = parent::connect_db();
         if (!self::is_already_reviewed($product_id)) {
           $insert_sth = $db->prepare('INSERT INTO reviews (user_id, product_id, rate, comment) VALUES (:user_id, :product_id, :rate, :comment);');
           $insert_sth->bindValue(':user_id',    $_SESSION['id'], PDO::PARAM_INT);
           $insert_sth->bindValue(':product_id', $product_id,     PDO::PARAM_INT);
           $insert_sth->bindValue(':rate',       $rate,           PDO::PARAM_INT);
           $insert_sth->bindValue(':comment',    $comment,        PDO::PARAM_STR);
           $insert_sth->execute();
         }
       } catch (PDOException $e) {
         die('Error:' . $e->getMessage());
       }
    }
  }
  public function get_rate_average($product_id){
    $rate_total=0;
    try {
       $db = parent::connect_db();
       $sth = $db->prepare('select rate from reviews WHERE product_id = :product_id;');
       $sth->bindValue(':product_id', $product_id, PDO::PARAM_INT);
       $sth->execute();
       $result = $sth->fetchAll(PDO::FETCH_COLUMN);
       if(empty($result)) {
         $result = "レビューなし";
       }else{
         foreach($result as $rate){
           $rate_total += $rate;
         }
         return $rate_total / count($result);
       }
       return $result;
     } catch (PDOException $e) {
       die('Error:' . $e->getMessage());
    }
  }
  public function save() {
    $db = parent::connect_db();
    $insert_sth = $db->prepare('
      INSERT INTO products (user_id, product_id, rate, comment)
      VALUES (:user_id, :product_id, :rate, :comment)
    ');
    $insert_sth->bindValue(':user_id',   $this->user_id,        PDO::PARAM_INT);
    $insert_sth->bindValue(':product_id',$this->product_id,     PDO::PARAM_INT);
    $insert_sth->bindValue(':rate',      $this->rate,           PDO::PARAM_INT);
    $insert_sth->bindValue(':comment',   $this->comment,        PDO::PARAM_STR);
    $insert_sth->execute();
    $this->id = $db->lastInsertId();

    $select_sth = $db->query("SELECT created_at FROM review WHERE id = $this->id");
    $select_result = $select_sth->fetch(PDO::FETCH_ASSOC);
    $this->created_at = $select_result['created_at'];
  }
}

