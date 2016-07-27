<?php
namespace App\services;

/**
 * Decorate the Firebase' response, and give additional possibilities to manipulate by that.
 * 
 */
class FirebaseResponse {
  private $response;

  /**
   * 
   * @param string $respones
   * @return object
   */
  public function __construct($response) {
    $this->response = $response;
  }

  /**
   * 
   * @return string
   */
  public function getRaw() {
    return $this->response;
  }

  /**
   * 
   * @return string
   */
  public function getJson() {
    return json_decode($this->response, true);
  }
}