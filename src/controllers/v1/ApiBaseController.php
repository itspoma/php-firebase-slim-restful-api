<?php
namespace App\controllers\v1;

abstract class ApiBaseController {

  /**
   * 
   * @return
   */
  static public function getModel() {
    throw new \Exception('The "getModel" should be implemented!');
  }

  /**
   * Fetch all records from Firebase for specific path (route)
   * 
   * @return
   */
  static public function query() {
    $items = static::getModel()->get('/')->getRaw();

    echo $items;
  }

  /**
   * Store a new record on Firebase
   * 
   * @return
   */
  static public function create() {
    $app = \Slim\Slim::getInstance();

    // get latest id
    $lastItemResponse = static::getModel()->getLast('/');
    $lastItemId = array_keys($lastItemResponse->getJson())[0];

    $newItemId = $lastItemId + 1;

    $item = [
      static::PRIMARY_KEY => $newItemId,
      'email' => $app->request->params('email'),
      'firstName' => $app->request->params('firstName'),
      'lastName' => $app->request->params('lastName'),
    ];

    $response = static::getModel()->push('/'.$newItemId, $item);

    var_dump($response->getRaw());die;
  }

  /**
   * Get specific item
   * 
   * @param string $id
   * @return
   */
  static public function retrieve($id) {
    $item = static::getModel()->get('/'.$id)->getRaw();

    echo $item;
  }

  /**
   * Update specific item
   * 
   * @param string $id
   * @return
   */
  static public function update($id) {
    echo 'update ' . $id;
    die;
  }

  /**
   * Remove specific item
   * 
   * @param string $id
   * @return
   */
  static public function delete($id) {
    // @todo add check if item has been removed
    static::getModel()->delete('/'.$id)->getRaw();

    $response = json_encode([
      'error' => null,
      'success' => true,
    ]);

    echo $response;
  }
}