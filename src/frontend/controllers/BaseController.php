<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;


/**
 * BaseController
 * @author wjh 2017-11-09
 */
class BaseController extends Controller
{
    public function beforeAction($action) {
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result) {
        return parent::afterAction($action, $result);
    }

}
