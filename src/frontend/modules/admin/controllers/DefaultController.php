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
        //组件调用
        $msg = \Yii::$app->utils->hello('qqq');
        echo $msg;
        die;

        return $this->render('index');
    }
}
