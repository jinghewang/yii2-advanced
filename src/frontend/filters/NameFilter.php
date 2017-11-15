<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/15
 * Time: 上午11:18
 */

namespace frontend\filters;

use Yii;
use yii\base\ActionFilter;

class NameFilter extends ActionFilter {

    private $_startTime;

    public $enabled = true;

    public $name;

    public function beforeAction($action) {
        $this->_startTime= microtime(true);
        if (isset($this->name['id']) && strlen($this->name['id']) > 2) {
            echo 'id is not right!';
            return false;
        } else {
            return parent::beforeAction($action);
        }
    }

    public function afterAction($action, $result) {
        if (!$this->enabled)
            return false;

        $time = microtime(true) - $this->_startTime;
        Yii::trace("Action '{$action->uniqueId}' spent $time second.");
        return parent::afterAction($action, $result);
    }

}