<?
require __DIR__ . '/../db/connect.php';
require __DIR__ . '/../app/models/Product.php';
require __DIR__ . '/../app/models/User.php';

$products = json_decode(file_get_contents(__DIR__ . '/../db/seeds/products.json'), true)['data'];
$users    = json_decode(file_get_contents(__DIR__ . '/../db/seeds/users.json'),    true)['data'];

foreach ($products as $params) {
  $product = new Product($params);
  $product->save();
}

foreach ($users as $params) {
  $user = new User($params);
  $user->save();
}
?>
