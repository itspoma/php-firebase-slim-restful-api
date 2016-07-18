<?php

require '../vendor/autoload.php';

new \App\controllers\v1\ApiV1UsersController;

// $secret = 'YWEoXhUGyP66iDouHqh8Wo8YtyYStpWghJwmhNyh';
// const DEFAULT_URL = 'https://php-firebase-slim-restfu-d0133.firebaseio.com/';

// $firebase = new \Firebase\FirebaseLib(DEFAULT_URL, $secret);
// $name = $firebase->get('/users');

// var_dump(11,$name);die;

\Slim\Slim::registerAutoloader();

\Slim\Route::setDefaultConditions(array(
  'id' => '[0-9]{1,}',
));

$app = new \Slim\Slim();

$app->get('/api/v1/users', '\App\controllers\v1\ApiV1UsersController:list');

// $app->get('/users', 'getWines');
// $app->get('/users/{id}', 'getWines');
// // $app->post('/wines', 'getWines');
// // $app->put('/wines', 'getWines');
// // $app->delete('/wines', 'getWines');

// $app->get('/articles/:id', function ($id) use ($app) {    
//   // callback code
// })->conditions(array('id' => '([0-9]{1,}'));


// $app->group('/users/{id:[0-9]+}', function () {
//     $this->map(['GET', 'DELETE', 'PATCH', 'PUT'], '', function ($request, $response, $args) {
//         // Find, delete, patch or replace user identified by $args['id']
//     })->setName('user');
//     $this->get('/reset-password', function ($request, $response, $args) {
//         // Route for /users/{id:[0-9]+}/reset-password
//         // Reset the password for user identified by $args['id']
//     })->setName('user-password-reset');
// });


//   // send response header for JSON content type
//   $app->response()->header('Content-Type', 'application/json');

//   // return JSON-encoded response body with query results
//   echo json_encode(R::exportAll($articles));

  // try {
  //   // query database for single article
  //   $article = R::findOne('articles', 'id=?', array($id));
     
  //   if ($article) {
  //     // if found, return JSON response
  //     $app->response()->header('Content-Type', 'application/json');
  //     echo json_encode(R::exportAll($article));
  //   } else {
  //     // else throw exception
  //     throw new ResourceNotFoundException();
  //   }
  // } catch (ResourceNotFoundException $e) {
  //   // return 404 server error
  //   $app->response()->status(404);
  // } catch (Exception $e) {
  //   $app->response()->status(400);
  //   $app->response()->header('X-Status-Reason', $e->getMessage());
  // }



function getWines() {
  var_dump(1);die;
}

// $app->get('/api/v1/diag', function () use ($app) {
//   echo '1';die;
// });

$app->run();

// var_dump($app);