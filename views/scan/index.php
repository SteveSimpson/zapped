<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Scans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Scan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'project_id',
            //'tool',
            //'version',
            'scan_date',
            // 'base_url:url',
            'host',
            // 'port',
            // 'reviewed_by',
            'review_completed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
