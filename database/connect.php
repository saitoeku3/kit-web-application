<?
function connect_db() {
  $json = file_get_contents(dirname(__FILE__) . "/../dbconfig.json");
  $config = json_decode($json, true);

  $dsn = "mysql:host=127.0.0.1;dbname=kit_web_application;charset=utf8";
  $username = $config["username"];
  $password = $config["password"];

  try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  } catch (PDOException $e) {
    echo $e;
    die();
  }
}
?>
