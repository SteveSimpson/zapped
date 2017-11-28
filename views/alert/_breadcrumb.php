<?php

$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['/project/index']];
$this->params['breadcrumbs'][] = ['label' => $model->scan->project->name, 'url' => ['/project/view', 'id'=>$model->scan->project->id]];
$this->params['breadcrumbs'][] = ['label' => $model->scan->scan_date . " (#".$model->scan->id.")", 'url' => ['/scan/view', 'id'=>$model->scan->id]];
