<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\DetailView;

$responsible;
if (!$model->responsible_id){
	$responsible = "Неопределен";
} else {
	$responsible = $model->responsible->name;
}

?>
<div class=""><?= Html::a($model->title, ['view', 'id' => $model->id], ['class' => '']) ?></div>
<div class="">Ответственный: <?= $responsible ?></div>
<div class="">Статус: <?= $model->status->title ?></div>
<div class="">Дата создания <?= $model->created_at ?></div>
<div class="">Дата изменения <?= $model->updated_at ?></div>
