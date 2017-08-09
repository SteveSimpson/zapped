<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'tool') ?>

    <?= $form->field($model, 'version') ?>

    <?= $form->field($model, 'scan_date') ?>

    <?php // echo $form->field($model, 'base_url') ?>

    <?php // echo $form->field($model, 'host') ?>

    <?php // echo $form->field($model, 'port') ?>

    <?php // echo $form->field($model, 'reviewed_by') ?>

    <?php // echo $form->field($model, 'review_completed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
