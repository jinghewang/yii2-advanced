<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/16
 * Time: 下午6:13
 */

namespace frontend\events;

use frontend\interfaces\DanceEventInterface;
use yii\base\Component;

class Dog extends Component implements DanceEventInterface {

    public function meetBuddy()
    {
        echo "Woof!";
        $this->trigger(DanceEventInterface::EVENT_DANCE);
    }

}