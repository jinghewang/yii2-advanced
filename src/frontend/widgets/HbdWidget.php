<?php

namespace frontend\widgets;

use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\Html;

/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/14
 * Time: 下午3:59
 */

class HbdWidget extends \yii\bootstrap\Widget {

    public $items = [];

    public function init() {

    }

    public function run() {
        BootstrapAsset::register($this->getView());
        return Html::tag('ul', implode('-',$this->items), $this->options);
    }

    public function render($view, $params = []) {
        return parent::render($view, $params);
    }

}