<?php

namespace frontend\controllers;

use frontend\models\Province;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ProvinceController extends ActiveController
{
    public $modelClass = 'frontend\models\Province';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function init() {
        parent::init();
        //禁用 Session
        \Yii::$app->user->enableSession = false;
    }


    public function actions() {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create']);

        // 使用"prepareDataProvider()"方法自定义数据provider
        //$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider(){
        return Province::findAll();
    }


    /**
     * 资源对象可以组成 集合， 每个集合包含一组相同类型的资源对象。
     * @return ActiveDataProvider
     */
    public function actionTest()
    {
        return new ActiveDataProvider([
            'query' => Province::find(),
        ]);
    }

}
