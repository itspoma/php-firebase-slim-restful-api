<?php
namespace App\services;

class FirebaseBaseModel {
  static private $instance;
  
  private $app;
  private $firebase;

  /**
   * 
   * @return object
   */
  static public function getInstance() {
    if (!self::$instance) {
      self::$instance = new static;
    }

    return self::$instance;
  }

  /**
   * 
   * @return object
   */
  public function __construct() {
    $this->app = \Slim\Slim::getInstance();

    $this->firebase = new \Firebase\FirebaseLib(
      $this->app->config('firebase.url'),
      $this->app->config('firebase.secret')
    );
  }

  /**
   * 
   * @return FirebaseResponse
   */
  public function get($subUrl) {
    $url = sprintf('/%s%s', $this->PATH, $subUrl);
    $responseRaw = $this->firebase->get($url);

    return new FirebaseResponse($responseRaw);
  }

  /**
   * 
   * @return FirebaseResponse
   */
  public function getLast($subUrl) {
    // @todo add "orderBy" param here, and ".indexOn" param on Firebase
    $url = sprintf('/%s%s', $this->PATH, $subUrl);

    $responseRaw = $this->firebase->get($url);
    $response = new FirebaseResponse($responseRaw);

    // leave only item with last-id
    // @todo
    $items = $response->getJson();
    arsort($items);
    $lastItem = array_slice($items, -1, 1, true);

    // manually build response (mocked)
    // @todo
    $lastItemResponseRaw = json_encode($lastItem);

    return new FirebaseResponse($lastItemResponseRaw);
  }

  /**
   * 
   * @return FirebaseResponse
   */
  public function push($subUrl, $value) {
    $url = sprintf('/%s%s', $this->PATH, $subUrl);
    $responseRaw = $this->firebase->push($url, $value);

    return new FirebaseResponse($responseRaw);
  }

  /**
   * 
   * @return FirebaseResponse
   */
  public function delete($subUrl) {
    $url = sprintf('/%s%s', $this->PATH, $subUrl);
    $responseRaw = $this->firebase->delete($url);

    return new FirebaseResponse($responseRaw);
  }
}