<?
require_once dirname(__FILE__) . "/./ApplicationModel.php";

class OrderHistory extends ApplicationModel {
  public $id;
  public $user_id;
  public $product_id;
  public $has_parchased;
  public $created_at;

  public function __construct($params) {
    $this->user_id = $params['user_id'];
    $this->product_id = $params['product_id'];
  }

  public function find_cart_products_by_user_id($user_id) {
    try {
      $db = parent::connect_db();
      $sth = $db->prepare('
        SELECT
          order_histories.id AS order_histories_id, order_histories.product_id, order_histories.quantity, products.name, products.price, products.image_url
        FROM
          order_histories INNER JOIN products ON order_histories.product_id = products.id WHERE user_id = :user_id and has_parchased = false ORDER BY order_histories.id DESC;'
      );
      $sth->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch (PDOException $e) {
      die('Error:' . $e->getMessage());
    }
  }

  public function find_parchased_products_by_user_id($user_id) {
    try {
      $db = parent::connect_db();
      $sth = $db->prepare('
        SELECT
          order_histories.id AS order_histories_id, order_histories.product_id,order_histories.created_at,order_histories.quantity, products.name, products.price, products.image_url
        FROM
          order_histories INNER JOIN products ON order_histories.product_id = products.id WHERE user_id = :user_id and has_parchased = true ORDER BY order_histories.id DESC;'
      );
      $sth->bindValue(':user_id', $user_id, PDO::PARAM_INT);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch (PDOException $e) {
      die('Error:' . $e->getMessage());
    }
  }

  public function add_carts($product_id) {
   if (isset($_SESSION['id'])) {
       try {
         $db = parent::connect_db();
         if (self::is_already_in_cart($product_id)) {
           self::add_product_quantity_in_carts($product_id);
         } else {
           $insert_sth = $db->prepare('INSERT INTO order_histories (user_id, product_id) VALUES (:user_id, :product_id);');
           $insert_sth->bindValue(':user_id',    $_SESSION['id'], PDO::PARAM_INT);
           $insert_sth->bindValue(':product_id', $product_id,     PDO::PARAM_INT);
           $insert_sth->execute();
         }
       } catch (PDOException $e) {
         die('Error:' . $e->getMessage());
       }
    }
  }

  public function edit_product_quantity($quantity,$product_id) {
    if (isset($_SESSION['id'])) {
      try {
        $db = parent::connect_db();
        $sth = $db->prepare('
          UPDATE
            order_histories
          SET
            quantity=:quantity WHERE user_id = :user_id and product_id = :product_id and has_parchased = false;'
        );
        $sth->bindValue(':quantity',   $quantity,       PDO::PARAM_INT);
        $sth->bindValue(':user_id',    $_SESSION['id'], PDO::PARAM_INT);
        $sth->bindValue(':product_id', $product_id,     PDO::PARAM_INT);
        $sth->execute();
      } catch (PDOException $e) {
        die('Error:' . $e->getMessage());
      }
    }
  }

  public static function is_already_in_cart($product_id) {
    // product_idを受け取ってカートにあるかどうか調べてbooleanを返す。
    if (isset($_SESSION['id'])) {
      $db = parent::connect_db();
      $sth = $db->prepare('
          SELECT * FROM order_histories WHERE user_id = :user_id and product_id = :product_id and has_parchased = false;'
      );
      $sth->bindValue(':user_id', $_SESSION['id'], PDO::PARAM_INT);
      $sth->bindValue(':product_id', $product_id, PDO::PARAM_INT);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return !empty($result);
    }
  }

  public static function add_product_quantity_in_carts($product_id) {
    // カートにある商品の個数をプラス１する。
    // quantityを持ってくる。
    if (isset($_SESSION['id'])) {
      $db = parent::connect_db();
      $sth = $db->prepare('
          SELECT quantity FROM order_histories WHERE user_id = :user_id and product_id = :product_id and has_parchased = false;'
      );
      $sth->bindValue(':user_id', $_SESSION['id'], PDO::PARAM_INT);
      $sth->bindValue(':product_id', $product_id, PDO::PARAM_INT);
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      // quantityを更新
      $sth = $db->prepare('
          UPDATE
            order_histories
          SET
          quantity=:quantity WHERE user_id = :user_id and product_id = :product_id and has_parchased = false;'
      );
      $sth->bindValue(':quantity', $result[0]['quantity']+1, PDO::PARAM_INT);
      $sth->bindValue(':user_id', $_SESSION['id'], PDO::PARAM_INT);
      $sth->bindValue(':product_id', $product_id, PDO::PARAM_INT);
      $sth->execute();
    }
  }

  public static function find_sold_during_one_week () {
    try {
      $db = parent::connect_db();
      $sth = $db->prepare('
        SELECT products.id, products.name, products.description, products.price, products.image_url
        FROM order_histories INNER JOIN products ON order_histories.product_id = products.id
        where DATE_ADD(order_histories.created_at, INTERVAL 7 DAY) > NOW();'
      );
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch (PDOException $e) {
      die('Error:' . $e->getMessage());
    }
  }

  public function give_order() {
    if (isset($_SESSION['id'])) {
      try{
        $db = parent::connect_db();
        $sth = $db->prepare('
          UPDATE
            order_histories
          SET
            has_parchased = true
          WHERE
            user_id = :user_id;'
        );
        $sth->bindValue(':user_id', $_SESSION['id'], PDO::PARAM_INT);
        $sth->execute();
      } catch (PDOException $e) {
        die('Error:' . $e->getMessage());
      }
    }
  }
  public function save() {
    try {
      $db = parent::connect_db();
      $insert_sth = $db->prepare('INSERT INTO order_histories (user_id, product_id) VALUES (:user_id, :product_id)');
      $insert_sth->bindValue(':user_id',    $this->user_id,    PDO::PARAM_INT);
      $insert_sth->bindValue(':product_id', $this->product_id, PDO::PARAM_INT);
      $insert_sth->execute();
      $this->id = $db->lastInsertId();

      $select_sth = $db->query("SELECT created_at FROM order_histories WHERE id = $this->id");
      $select_result = $select_sth->fetch(PDO::FETCH_ASSOC);
      $this->created_at = $select_result['created_at'];
    } catch (PDOException $e) {
      die('Error:' . $e->getMessage());
    }
  }

  public function destroy($id)
    {
    try {
      $db = parent::connect_db();
      $sth = $db->prepare('DELETE from order_histories where id = :id');
      $sth->bindValue(':id', $id, PDO::PARAM_INT);
      $sth->execute();
    } catch (PDOException $e) {
      die('Error:' . $e->getMessage());
    }
  }
}
