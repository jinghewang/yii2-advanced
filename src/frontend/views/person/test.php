<?php

use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['test']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2><?php echo Url::to(['site/offline', 'id' => 100]) ?></h2>
    <h2>
        <?php
        echo Alert::widget([
            'options' => ['class' => 'alert-info'],
            'body'    => Yii::$app->session->getFlash('postDeleted'),
        ]);
        ?>
    </h2>

</div>
