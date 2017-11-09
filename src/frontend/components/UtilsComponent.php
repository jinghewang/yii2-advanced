<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/9
 * Time: 上午11:37
 */

namespace frontend\Components;

use Yii;
use yii\base\Component;

class UtilsComponent extends Component {


    private $name;

    public static $num = 0;

    /**
     * UtilsComponent constructor.
     */
    public function __construct() {
        self::$num++;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }


    /**
     * output test info
     * @author wjh 2017-11-09
     * @param string $message
     * @return string
     */
    public function hello($message) {
        $n = self::$num;
        return "{$this->name}[{$n}]:" . $message;
    }


}