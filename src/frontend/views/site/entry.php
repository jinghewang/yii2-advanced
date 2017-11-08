<?php

use yii\widgets\ActiveForm;
use \yii\helpers\Html;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->label('姓名') ?>
<?= $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>