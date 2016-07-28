<?php
namespace App\controllers\v1;

use \App\services\FirebaseOrdersModel as OrdersModel;

class ApiOrdersController extends ApiBaseController {
  const PRIMARY_KEY = 'orderId';

  /**
   * 
   * @return
   */
  static public function getModel() {
    return OrdersModel::getInstance();
  }
}