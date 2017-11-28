<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Alert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'review_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reviewed_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_completed')->widget(DateTimePicker::className(), [
        'convertFormat' => false,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd hh:ii:ss',
            //'startDate' => '01-Mar-2014 12:00 AM',
            'todayHighlight' => true
        ]
    ]) ?>

    <?= $form->field($model, 'scan_id')->textInput(['readOnly'=>true]) ?>

    <?= $form->field($model, 'test_id')->textInput(['readOnly'=>true]) ?>

    <?= $form->field($model, 'alert')->textInput(['maxlength' => true,'readOnly'=>true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'readOnly'=>true]) ?>

    <?= $form->field($model, 'riskcode')->textInput(['maxlength' => true,'readOnly'=>true]) ?>

    <?= $form->field($model, 'confidence')->textInput(['maxlength' => true,'readOnly'=>true]) ?>

    <?= $form->field($model, 'riskdesc')->textInput(['maxlength' => true,'readOnly'=>true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 12,'readOnly'=>true]) ?>

    <?= $form->field($model, 'count')->textInput(['readOnly'=>true]) ?>

    <?= $form->field($model, 'solution')->textarea(['rows' => 12,'readOnly'=>true]) ?>

    <?= $form->field($model, 'reference')->textarea(['rows' => 6,'readOnly'=>true]) ?>

    <?= $form->field($model, 'cweid')->textInput(['readOnly'=>true]) ?>

    <?= $form->field($model, 'wascid')->textInput(['readOnly'=>true]) ?>

    <?= $form->field($model, 'sourceid')->textInput(['readOnly'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
