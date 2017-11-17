<?php
/**
 * Created by PhpStorm.
 * User: hbd
 * Date: 2017/11/17
 * Time: 下午3:04
 */

namespace frontend\services;

class MonologBuilder {

    public static function build($name)
    {
        return function () use ($name) {
            $logger = new \Monolog\Logger($name);
            $logger->pushHandler(new \Monolog\Handler\PHPConsoleHandler());
            // ... other initializations ...
            return $logger;
        };
    }

}