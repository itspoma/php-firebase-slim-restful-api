<?php
namespace App\controllers\v1;

use \App\services\Firebase as Firebase;

class ApiBaseController {

  /**
   * 
   * @return
   */
  static public function query() {
    echo 'query ' . static::KEY;
    die;
  }

  /**
   * 
   * @return
   */
  static public function create() {
    echo 'create ' . static::KEY;
    die;
  }

  /**
   * 
   * @return
   */
  static public function retrieve() {
    echo 'retrieve ' . static::KEY;
    die;
  }

  /**
   * 
   * @return
   */
  static public function update() {
    echo 'update ' . static::KEY;
    die;
  }

  /**
   * 
   * @return
   */
  static public function remove() {
    echo 'remove ' . static::KEY;
    die;
  }
}