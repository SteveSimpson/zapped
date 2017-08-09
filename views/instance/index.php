<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Instance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'alert_id',
            'uri',
            'method',
            'parameter',
            // 'evidence',
            // 'attack',
            // 'review_status',
            // 'reviewed_by',
            // 'review_completed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
