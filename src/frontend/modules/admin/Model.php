<?php

namespace frontend\modules\admin;
use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * admin module definition class
 */
class Model extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }


    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app) {

        $app->getUrlManager()->addRules([
            [
                'pattern' => 'admin2',
                'route'   => 'admin/default/index',
                'suffix'  => '',
            ]
        ],false);

    }
}
