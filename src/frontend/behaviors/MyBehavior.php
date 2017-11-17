<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/17
 * Time: 上午10:59
 */

namespace frontend\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\web\Controller;

class MyBehavior extends Behavior {


    public $prop1;

    private $_prop2;

    /**
     * @return mixed
     */
    public function getProp2() {
        return $this->_prop2;
    }

    /**
     * @param mixed $prop2
     */
    public function setProp2($prop2) {
        $this->_prop2 = $prop2;
    }

    public function foo() {
        \Yii::trace('--foo--',__CLASS__);
    }

    public function events() {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
            Controller::EVENT_BEFORE_ACTION => 'beforeAction2',
        ];
    }

    public function beforeValidate($event)
    {
        // 处理器方法逻辑
        \Yii::trace('--beforeValidate--',__CLASS__);
    }

    public function beforeAction2($event)
    {
        // 处理器方法逻辑
        \Yii::trace('--beforeAction2--',__CLASS__);
    }


}