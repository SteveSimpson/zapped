<?php

use kartik\helpers\Html;
use kartik\helpers\Enum;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

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
            'name',
            'description:ntext',
        ],
    ]) ?>

	<?php 
	if (count($model->scans)) {
	    echo "<table class='table table-bordered table-striped'>\n";
	    echo "<tr><th>Scan Date</th><th>Base URL</th><th>Reviewed By</th><th>Review Completed</th></tr>\n";
    	foreach ($model->scans as $scan) {
    	    $link = Html::a($scan->scan_date, ['/scan/view', 'id'=>$scan->id] );
    	    
    	    echo "<tr><td>" . $link . "</td>";
    	    
    	    echo "<td>" . strip_tags($scan->base_url) . "</td>";
    	    
    	    echo "<td>" . strip_tags($scan->reviewed_by) . "</td>";
    	    
    	    echo "<td>" . strip_tags($scan->review_completed) . "</td></tr>\n";
    	}

    	echo "</table>\n";
	}
	?>
	
</div>
