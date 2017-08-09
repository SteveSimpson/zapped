<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Scan */

$this->title = 'Create Scan';
$this->params['breadcrumbs'][] = ['label' => 'Scans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
