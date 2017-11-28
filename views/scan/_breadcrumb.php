<?php

$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['/project/index']];
$this->params['breadcrumbs'][] = ['label' => $model->project->name, 'url' => ['/project/view', 'id'=>$model->project->id]];

