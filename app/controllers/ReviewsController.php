<?
require_once dirname(__FILE__) . '/./ApplicationController.php';
require_once dirname(__FILE__) . '/../models/Review.php';

class ReviewsController extends ApplicationController {
    function create() {
      $comment="特になし。";
      $rate;
      $product_id;
      Parent::is_logged_in();
      if(isset($_POST['comment'])) {
         $comment=$_POST['comment'];
      }
      $rate = $_POST['rate'];
      $product_id = $_POST['product_id'];
      Review::post_Review($product_id,$rate,$comment);
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/kit-web-application/products/'.$product_id);
      exit();
    }
}
