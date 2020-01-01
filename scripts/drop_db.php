<?
require dirname(__FILE__) . "/../database/connect.php";

try {
  $db = connect_db();
  $sql = $db->prepare("drop database kit_web_application");
  $sql->execute();
  echo "Drop kit_web_application successfully!";
} catch (PDOException $e) {
  echo $e;
  die();
}
?>
