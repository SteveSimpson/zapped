<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Scan */

$this->title = $model->scan_date . " (#".$model->id.")";

include('_breadcrumb.php');

//$this->params['breadcrumbs'][] = ['label' => 'Scans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scan-view">

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
            'project_id',
            'tool',
            'version',
            'scan_date',
            'base_url:url',
            'host',
            'port',
            'reviewed_by',
            'review_completed',
        ],
    ]) ?>

    <?php
        if (count($model->alerts)) {
            echo "<table class='table table-bordered table-striped'>\n";
            echo "<tr><th>Alert</th><th>Severity</th><th>Count</th><th>Review Status</th><th>Reviewed By</th><th>Review Completed</th></tr>\n";
            foreach ($model->alerts as $alert) {
                $link = Html::a($alert->alert, ['/alert/view', 'id'=>$alert->id] );

                echo "<tr><td>" . $link . "</td>";

                echo "<td>" . $alert->severity . "</td>";

                echo "<td>" . $alert->count . "</td>";

                echo "<td>" . $alert->review_status . "</td>";

                echo "<td>" . strip_tags($alert->reviewed_by) . "</td>";

                echo "<td>" . strip_tags($alert->review_completed) . "</td></tr>\n";
            }

            echo "</table>\n";
        }
     ?>

</div>
