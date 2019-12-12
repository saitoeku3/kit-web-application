<?
$json = file_get_contents("dbconfig.json");
$config = json_decode($json, true);

$dsn = "mysql:host=127.0.0.1;charset=utf8";
$username = $config["username"];
$password = $config["password"];

try {
  $pdo = new PDO($dsn, $username, $password);
  $pdo->exec("CREATE DATABASE kit_web_application;");
  echo "Create kit_web_application successfully!";
} catch (PDOException $e) {
  echo $e;
  die();
}
?>
