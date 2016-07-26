<?php
require '../vendor/autoload.php';

\Slim\Slim::registerAutoloader();

\Slim\Route::setDefaultConditions(array(
  'id' => '[0-9]{1,}',
));

// 
$config = array();

require_once 'config/default.php';
require_once 'config/development.php';

// 
$app = new \Slim\Slim();

foreach ($config as $key => $value) {
  $app->config($key, $value);
}

// 
$app->group('/api/v1', function () use ($app) {

  // users
  $app->group('/users', function () use ($app) {
    $_class = '\App\controllers\v1\ApiUsersController';

    // list
    $app->get('/', $_class.':query');
    $app->post('/', $_class.':create');

    // item
    $app->get('/:id', $_class.':retrieve');
    $app->put('/:id', $_class.':update');
    $app->delete('/:id', $_class.':remove');
  });

  // orders
  $app->group('/orders', function () use ($app) {
    $_class = '\App\controllers\v1\ApiOrdersController';

    // list
    $app->get('/', $_class.':query');
    $app->post('/', $_class.':query');

    // item
    $app->get('/:id', $_class.':retrieve');
    $app->get('/:id', $_class.':create');
    $app->put('/:id', $_class.':update');
    $app->delete('/:id', $_class.':remove');
  });

});

// fallback on error event
$app->error(function (\Exception $e) use ($app) {
  $app->response->headers->set('Content-Type', 'application/json');

  echo json_encode(array(
    'code' => $e->getCode(),
    'message' => $e->getMessage(),
    'file' => $e->getFile(),
    'line' => $e->getLine(),
  ));
});

// fallback on not-found event
$app->notFound(function () use ($app) {
  $app->response->headers->set('Content-Type', 'application/json');

  echo json_encode(array(
    'code' => 404,
    'message' => 'Not found'
  ));
});

$app->run();