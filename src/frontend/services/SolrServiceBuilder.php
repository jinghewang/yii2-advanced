<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/17
 * Time: 下午3:04
 */

namespace frontend\services;

class SolrServiceBuilder {

    public static function build($ip)
    {
        return function () use ($ip) {
            $solr = new \frontend\services\SolrService($ip);
            // ... other initializations ...
            return $solr;
        };
    }

}