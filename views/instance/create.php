<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Instance */

$this->title = 'Create Instance';
$this->params['breadcrumbs'][] = ['label' => 'Instances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
