<?
require __DIR__ . '/./vendor/autoload.php';
require __DIR__ . '/./app/controllers/RootController.php';

$router = new AltoRouter();
$router->setBasePath('/kit-web-application');
$router->map('GET', '/', 'RootController#index', 'index');
$match = $router->match();

list( $controller, $action ) = explode( '#', $match['target'] );

if ( is_callable(array($controller, $action)) ) {
  $obj = new $controller();
  call_user_func_array(array($obj,$action), array($match['params']));
} else if ($match['target']==''){
  echo 'Error: no route was matched';
} else {
  echo 'Error: can not call '.$controller.'#'.$action;
}
?>
