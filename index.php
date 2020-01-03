<?
require __DIR__ . '/./vendor/autoload.php';
require __DIR__ . '/./app/controllers/CartsController.php';
require __DIR__ . '/./app/controllers/RootController.php';
require __DIR__ . '/./app/controllers/RegistrationsController.php';
require __DIR__ . '/./app/controllers/SessionsController.php';

$router = new AltoRouter();
$router->setBasePath('/kit-web-application');
$router->map('GET',    '/',         'RootController#index');
$router->map('GET',    '/sign-up',  'RegistrationsController#new');
$router->map('POST',   '/sign-up',  'RegistrationsController#create');
$router->map('GET',    '/sign-in',  'SessionsController#new');
$router->map('POST',   '/sign-in',  'SessionsController#create');
$router->map('DELETE', '/sign-out', 'SessionsController#destroy');
$router->map('GET',    '/carts',    'CartsController#index');
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
