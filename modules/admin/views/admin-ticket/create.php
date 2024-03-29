<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Ticket */

$this->title = 'Create Ticket';
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('create_form', [
        'model' => $model,
        'statusList' => $statusList,
    ]) ?>

</div>
