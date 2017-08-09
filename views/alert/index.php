<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alerts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Alert', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'scan_id',
            'test_id',
            'alert',
            'name',
            // 'riskcode',
            // 'confidence',
            // 'riskdesc',
            // 'description:ntext',
            // 'count',
            // 'solution',
            // 'reference',
            // 'cweid',
            // 'wascid',
            // 'sourceid',
            // 'review_status',
            // 'reviewed_by',
            // 'review_completed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
