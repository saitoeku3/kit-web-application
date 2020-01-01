<?
require dirname(__FILE__) . "/../database/connect.php";
require dirname(__FILE__) . "/../database/scheme.php";

try {
  $db = connect_db();

  echo "---------- migrating users table ----------\n";
  $users_sql = $db->prepare($users);
  $users_sql->execute();

  echo "---------- migrating products table ----------\n";
  $products_sql = $db->prepare($products);
  $products_sql->execute();

  echo "---------- migrating reviews table ----------\n";
  $reviews_sql = $db->prepare($reviews);
  $reviews_sql->execute();

  echo "---------- migrating order_histories table ----------\n";
  $order_histories_sql = $db->prepare($order_histories);
  $order_histories_sql->execute();

  echo "Migrate kit_web_application successfully!";
} catch (PDOException $e) {
  echo $e;
  die();
}
?>
