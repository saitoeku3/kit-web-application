<?
require_once dirname(__FILE__) . "/./ApplicationController.php";
require_once dirname(__FILE__) . "/../models/Product.php";

class SearchController extends ApplicationController{
  public function index() {
    $reg_result;
    $queries;
    $word = '';

    preg_match('/\?q=.+$/', $_SERVER["REQUEST_URI"], $reg_result);

    if (array_key_exists(0, $reg_result)) {
      parse_str($reg_result[0], $queries);
      $word = $queries['?q'];
    }

    $products = Product::find_by_name($word);

    $title = '「'.$word.'」の検索結果';
    $body = __DIR__ . '/../views/search/index.php';
    $data = array('word' => $word, 'products' => $products);
    echo view($title, $body, $data);
  }
}
