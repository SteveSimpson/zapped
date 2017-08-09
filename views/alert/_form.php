<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'scan_id')->textInput() ?>

    <?= $form->field($model, 'test_id')->textInput() ?>

    <?= $form->field($model, 'alert')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'riskcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confidence')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'riskdesc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'solution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cweid')->textInput() ?>

    <?= $form->field($model, 'wascid')->textInput() ?>

    <?= $form->field($model, 'sourceid')->textInput() ?>

    <?= $form->field($model, 'review_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reviewed_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_completed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
