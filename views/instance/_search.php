<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'alert_id') ?>

    <?= $form->field($model, 'uri') ?>

    <?= $form->field($model, 'method') ?>

    <?= $form->field($model, 'parameter') ?>

    <?php // echo $form->field($model, 'evidence') ?>

    <?php // echo $form->field($model, 'attack') ?>

    <?php // echo $form->field($model, 'review_status') ?>

    <?php // echo $form->field($model, 'reviewed_by') ?>

    <?php // echo $form->field($model, 'review_completed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
