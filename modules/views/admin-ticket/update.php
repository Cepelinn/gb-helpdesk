<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Ticket */

$this->title = 'Update Ticket: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <span>Автор: <?= $model->authorName ?></span>

    <?= $this->render('update_form', [
        'model' => $model,
        'statusList' => $statusList,
    ]) ?>

</div>
