<?php
use yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($form, 'name') ?>
<?= $form->field($form, 'email') ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>