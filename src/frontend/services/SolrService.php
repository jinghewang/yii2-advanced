<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/17
 * Time: 下午3:05
 */

namespace frontend\services;


class SolrService{

    private $ip;

    /**
     * @return mixed
     */
    public function getIp() {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip) {
        $this->ip = $ip;
    }

    /**
     * SolrService constructor.
     */
    public function __construct($ip) {
        $this->ip = $ip;
    }

    public function search($word) {
        \Yii::trace('--search:'.$word,__METHOD__);
    }



}