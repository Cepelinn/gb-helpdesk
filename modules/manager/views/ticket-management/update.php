<?php

use yii\helpers\Html;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Ticket */

$this->title = "Update ticket information";
$this->params['breadcrumbs'][] = ['label' => 'Administration tools', 'url' => ['/admin'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['/admin/admin-ticket'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = ['label' => "Ticket info", 'url' => ['view', 'id' => $model->id], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = $this->title.' ('.$model->title.')';
?>

<?= Menu::widget([
    'items' => [
        ['label' => 'Back to ticket info', 'url' => ['/admin/admin-ticket/view', 'id' => $model->id],'options'=>['class'=>'profile_menu-item']],
    ],
    'options' => [
                    'id'=>'navid',
                    'class' => 'navbar-nav',
                    'data'=>'menu',
                ],
                'options' => ['class' => 'profile_menu'],
                'activeCssClass'=>'profile_menu-item__active',
]); ?>

<div class="ticket-update">
    <span>Автор: <?= $model->authorName ?></span>

    <?= $this->render('update_form', [
        'model' => $model,
        'statusList' => $statusList,
        'userList' => $userList,
    ]) ?>

</div>
