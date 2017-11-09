<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/8
 * Time: 上午11:49
 */

namespace frontend\controllers;


use frontend\models\Country;
use Woodw\Utils\Utils;
use yii\data\Pagination;
use yii\web\Controller;

class CountryController extends Controller {

    public function actionIndex() {
        $query = Country::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }

}