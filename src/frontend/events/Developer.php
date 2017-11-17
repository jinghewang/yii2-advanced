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

class Developer extends Component implements DanceEventInterface {

    public function testsPassed()
    {
        echo "Yay!";
        $this->trigger(DanceEventInterface::EVENT_DANCE);
    }
}