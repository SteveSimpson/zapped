<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Alert */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Alerts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'scan_id',
            'test_id',
            'alert',
            'name',
            'riskcode',
            'confidence',
            'riskdesc',
            'description:ntext',
            'count',
            'solution',
            'reference',
            'cweid',
            'wascid',
            'sourceid',
            'review_status',
            'reviewed_by',
            'review_completed',
        ],
    ]) ?>

    <?php 
        if (count($model->instances)) {
            
            foreach ($model->instances as $instance) {
                //$link = Html::a($alert->alert, ['/alert/view', 'id'=>$alert->id] );
                $data  = "<ul>";
                foreach (['uri', 'method', 'parameter', 'evidence', 'attack'] as $parameter) {
                    if (strlen(trim($instance->$parameter)) > 0) {
                        $data .= "<li>" . ucfirst($parameter) . ": " . $instance->$parameter . "</li>";
                    }
                }

                $data .= "</ul>";
                
                echo Html::well($data);
            }
        }
     ?>

</div>
