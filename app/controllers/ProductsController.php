<?
require_once dirname(__FILE__) . '/./ApplicationController.php';
require_once dirname(__FILE__) . '/../models/Product.php';

class ProductsController {
  public function show() {
    $keys = parse_url($_SERVER['REQUEST_URI']); // パース処理
    $path = explode('/', $keys['path']); // 分割処理
    $last = end($path); // 最後の要素を取得

    $product = Product::find_by_id($last);

    $title = 'カート';
    $body = __DIR__ . '/../views/products/show.php';
    $data = array(
      'id'          => $product[0]['id'],
      'name'        => $product[0]['name'],
      'description' => $product[0]['description'],
      'price'       => $product[0]['price'],
      'category'    => $product[0]['category'],
      'image_url'   => $product[0]['image_url']
    );
    echo view($title, $body, $data);
  }

  public function create() {
    if (
      !isset($_POST['name']) || $_POST['name'] === '' ||
      !isset($_POST['description']) || $_POST['description'] === '' ||
      !isset($_POST['image_url']) || $_POST['image_url'] === '' ||
      !isset($_POST['category']) || $_POST['category'] === '' ||
      !isset($_POST['price']) || $_POST['price'] === 0
    ) {
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/kit-web-application/manegements/new', true, 302);
      exit();
    }

    $params = array(
      'name'        => $_POST['name'],
      'description' => $_POST['description'],
      'category'    => $_POST['category'],
      'image_url'   => $_POST['image_url'],
      'price'       => $_POST['price']
    );

    $product = new Product($params);
    $product->save();

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/kit-web-application/', true, 302);
    exit();
  }

  public function destroy() {
    $reg_result;
    $queries;

    preg_match('/\d+/', $_SERVER["REQUEST_URI"], $reg_result);
    $id = $reg_result[0];
    echo $id;
    Product::destroy($id);
    header('Location: http://'.$_SERVER['SERVER_NAME'].'/kit-web-application/manegements', true, 302);
    exit();
  }
}
