<?
require __DIR__ . '/./vendor/autoload.php';
require __DIR__ . '/./app/controllers/CartsController.php';
require __DIR__ . '/./app/controllers/ManegementsController.php';
require __DIR__ . '/./app/controllers/OrdersController.php';
require __DIR__ . '/./app/controllers/ProductsController.php';
require __DIR__ . '/./app/controllers/RegistrationsController.php';
require __DIR__ . '/./app/controllers/RootController.php';
require __DIR__ . '/./app/controllers/SearchController.php';
require __DIR__ . '/./app/controllers/SessionsController.php';

$router = new AltoRouter();
$router->setBasePath('/kit-web-application');

$router->map('GET',  '/',                'RootController#index');
$router->map('GET',  '/carts',           'CartsController#index');
$router->map('POST', '/carts',           'CartsController#create');
$router->map('POST', '/carts/[i:id]',    'CartsController#destroy'); // DELETE
$router->map('GET',  '/manegements',     'ManegementsController#index');
$router->map('GET',  '/orders',          'OrdersController#index');
$router->map('GET',  '/orders/new',      'OrdersController#new');
$router->map('POST', '/orders',          'OrdersController#create');
$router->map('POST', '/orders/edit',     'OrdersController#edit'); // PATCHにしたい
$router->map('GET',  '/products/[i:id]', 'ProductsController#show');
$router->map('GET',  '/search',          'SearchController#index');
$router->map('GET',  '/sign-in',         'SessionsController#new');
$router->map('POST', '/sign-in',         'SessionsController#create');
$router->map('GET',  '/sign-up',         'RegistrationsController#new');
$router->map('POST', '/sign-up',         'RegistrationsController#create');
$router->map('POST', '/sign-out',        'SessionsController#destroy'); // DELETE

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
