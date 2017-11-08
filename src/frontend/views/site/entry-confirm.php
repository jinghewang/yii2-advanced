<?php
use yii\helpers\Html;

/**
 * @var \yii\base\Model $model
 * @var \yii\web\View $this
 */
?>

<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>:<?= Html::encode($model->name) ?></li>
    <li><label>Name</label>:<?= Html::encode($model->email) ?></li>
</ul>
