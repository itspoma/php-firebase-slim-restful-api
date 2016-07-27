<?php
namespace App\controllers\v1;

// use \App\services\Firebase as Firebase;
use \App\services\FirebaseUsersModel as UsersModel;

class ApiBaseController {

  /**
   * 
   * @return
   */
  static public function query() {
    echo UsersModel::getInstance()->get('/')->getRaw();
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