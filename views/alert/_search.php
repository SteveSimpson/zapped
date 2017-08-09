<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlertSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alert-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'scan_id') ?>

    <?= $form->field($model, 'test_id') ?>

    <?= $form->field($model, 'alert') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'riskcode') ?>

    <?php // echo $form->field($model, 'confidence') ?>

    <?php // echo $form->field($model, 'riskdesc') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'solution') ?>

    <?php // echo $form->field($model, 'reference') ?>

    <?php // echo $form->field($model, 'cweid') ?>

    <?php // echo $form->field($model, 'wascid') ?>

    <?php // echo $form->field($model, 'sourceid') ?>

    <?php // echo $form->field($model, 'review_status') ?>

    <?php // echo $form->field($model, 'reviewed_by') ?>

    <?php // echo $form->field($model, 'review_completed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
