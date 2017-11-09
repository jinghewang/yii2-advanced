<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/8
 * Time: 上午10:38
 */

namespace frontend\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model {

    public $name;
    public $email;

    public function rules() {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}