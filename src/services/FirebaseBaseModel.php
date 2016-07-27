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
    $url = sprintf('/%s%s', $this->KEY, $subUrl);
    $response = $this->firebase->get($url);
    
    return new FirebaseResponse($response);
  }
}