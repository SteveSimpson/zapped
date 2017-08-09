<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alert */

$this->title = 'Update Alert: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Alerts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
