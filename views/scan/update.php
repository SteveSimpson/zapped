<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Scan */

$title = $model->scan_date . " (#".$model->id.")";

$this->title = 'Update Scan: ' . $title;

include('_breadcrumb.php');

// $this->params['breadcrumbs'][] = ['label' => 'Scans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
