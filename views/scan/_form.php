<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'tool')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scan_date')->textInput() ?>

    <?= $form->field($model, 'base_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'port')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reviewed_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_completed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
