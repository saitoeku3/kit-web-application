<?
class ProductsController {
  public function show() {
      $title = "カート";
      $body = file_get_contents(__DIR__ . '/../views/products/show.php');
      echo template($title, $body);
  }
}
