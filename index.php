<?
require __DIR__ . '/./vendor/autoload.php';
require __DIR__ . '/./app/controllers/CartController.php';
require __DIR__ . '/./app/controllers/RootController.php';
require __DIR__ . '/./app/controllers/RegistrationController.php';
require __DIR__ . "/./app/views/layouts/template.php";

$router = new AltoRouter();
$router->setBasePath('/kit-web-application');
$router->map('GET',  '/',       'RootController#index');
$router->map('GET',  '/signup', 'RegistrationController#signup');
$router->map('POST', '/signup', 'RegistrationController#create');
$router->map('GET',  '/signin', 'RegistrationController#signin');
$router->map('GET',  '/carts',  'CartController#index');
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
