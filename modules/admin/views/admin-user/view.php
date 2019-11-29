<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserRecord */

$this->title = "Profile info ({$model->username})";
$this->params['breadcrumbs'][] = ['label' => 'Administration tools', 'url' => ['/admin'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/admin/admin-user'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?= Menu::widget([
    'items' => [
        ['label' => 'Update user info', 'url' => ['/admin/admin-user/update', 'id' => $model->id],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Change password', 'url' => ['/admin/admin-user/password-change', 'id' => $model->id],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Delete user', 
            'url' => ['/admin/admin-user/delete', 'id' => $model->id],
            'template' => '<a href="{url}" data-method = "post" data-confirm = "Are you sure you want to delete this user?">{label}</a>',
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

<div class="user-record-view">
    <div class="user-view">
        <h2 class="block-title">User information summary</h2>
        <ul class='user-view_summary'>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>ID:&nbsp;</span><?= $model->id ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Username:&nbsp;</span><?= $model->username ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Auth key:&nbsp;</span><?= $model->authKey ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Name:&nbsp;</span><?= $model->name ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Email:&nbsp;</span><?= $model->email ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Registration Data:&nbsp;</span><?= $model->created_at ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Update Data:&nbsp;</span><?= $model->updated_at ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>ROLE:&nbsp;</span><?= $model->role->item_name ?>
            </li>
        </ul>
</div>
</div>