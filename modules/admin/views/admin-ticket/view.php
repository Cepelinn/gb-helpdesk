<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Ticket */

$this->title = "Ticket info";
$this->params['breadcrumbs'][] = ['label' => 'Administration tools', 'url' => ['/admin'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['/admin/admin-ticket'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = $this->title.' ('.$model->title.')';
\yii\web\YiiAsset::register($this);
?>

<?= Menu::widget([
    'items' => [
        ['label' => 'Update ticket info', 'url' => ['/admin/admin-ticket/update', 'id' => $model->id],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Delete ticket', 
            'url' => ['/admin/admin-ticket/delete', 'id' => $model->id],
            'template' => '<a href="{url}" data-method = "post" data-confirm = "Are you sure you want to delete this this ticket?">{label}</a>',
            'options'=>['class'=>'profile_menu-item',]
        ],
    ],
    'options' => [
                    'id'=>'navid',
                    'class' => 'navbar-nav',
                    'data'=>'menu',
                ],
                'options' => ['class' => 'profile_menu'],
                'activeCssClass'=>'profile_menu-item__active',
]); ?>

<div class="user-view">
        <h2 class="block-title">User information summary</h2>
        <ul class='user-view_summary'>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>ID:&nbsp;</span><?= $model->id ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Author name:&nbsp;</span><?= $model->authorName ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Title:&nbsp;</span><?= $model->title ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Description:&nbsp;</span><?= $model->description ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Responsible username:&nbsp;</span><?= $model->responsibleName ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Status:&nbsp;</span><?= $model->statusName ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Creation Data:&nbsp;</span><?= $model->created_at ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Update Data:&nbsp;</span><?= $model->updated_at ?>
            </li>
        </ul>

</div>
