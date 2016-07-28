<?php
namespace App\controllers\v1;

use \App\services\FirebaseUsersModel as UsersModel;

class ApiUsersController extends ApiBaseController {
	const PRIMARY_KEY = 'userId';

  /**
   * 
   * @return
   */
  static public function getModel() {
	return UsersModel::getInstance();
  }
}