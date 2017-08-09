<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Instance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alert_id')->textInput() ?>

    <?= $form->field($model, 'uri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'method')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parameter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'evidence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attack')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reviewed_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_completed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
