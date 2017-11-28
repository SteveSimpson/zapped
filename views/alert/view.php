<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Alert */

$this->title = $model->name;

include('_breadcrumb.php');

//$this->params['breadcrumbs'][] = ['label' => 'Alerts', 'url' => ['index']];
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
            'descriptionClean:raw',
            'count',
            'solutionClean:raw',
            'referenceClean:html',
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
                foreach (['uri', 'method', 'parameter', 'evidence', 'attack'] as $key => $parameter) {
                    if (strlen(trim($instance->$parameter)) > 0) {
                        if ($key == 'uri') {
                            $url = $instance->$parameter;
                            if (filter_var($url, FILTER_VALIDATE_URL)) {
                                $url = Html::a($url, $url, ['target'=>'_blank']);
                            }
                            $data .= "<li>URI: " . $url . "</li>";
                        } else {
                            $data .= "<li>" . ucfirst($parameter) . ": " . $instance->$parameter . "</li>";
                        }
                    }
                }

                $data .= "</ul>";

                echo Html::well($data);
            }
        }
     ?>

</div>
