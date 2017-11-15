<?php

namespace frontend\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        /**
         * @var \frontend\Components\UtilsComponent $utils
         */

        //组件调用
        $utils = \Yii::$app->utils;
        $utils->setNumPP();
        $msg = $utils->hello('qqq');
        return $this->render('index', ['msg' => $msg]);
    }
}
