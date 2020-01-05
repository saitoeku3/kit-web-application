<?
require __DIR__ . '/../db/connect.php';
require __DIR__ . '/../app/models/Product.php';

$products = json_decode(file_get_contents(__DIR__ . '/../db/seeds/products.json'), true)['data'];

foreach ($products as $params) {
  $product = new Product($params);
  $product->save();
}
?>
