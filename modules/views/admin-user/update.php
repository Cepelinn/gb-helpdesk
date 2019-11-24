<?php

use yii\helpers\Html;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserRecord */

$this->title = "Update user information";
$this->params['breadcrumbs'][] = ['label' => 'Administration tools', 'url' => ['/admin'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/admin/admin-user'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = ['label' => "Profile info", 'url' => ['view', 'id' => $model->id], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = $this->title.' ('.$model->username.')';
?>

<?= Menu::widget([
    'items' => [
        ['label' => 'Back to profile info', 'url' => ['/admin/admin-user/view', 'id' => $model->id],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Change password', 'url' => ['/admin/admin-user/password-change', 'id' => $model->id],'options'=>['class'=>'profile_menu-item']],
    ],
    'options' => [
                    'id'=>'navid',
                    'class' => 'navbar-nav',
                    'data'=>'menu',
                ],
                'options' => ['class' => 'profile_menu'],
                'activeCssClass'=>'profile_menu-item__active',
]); ?>

<div class="user-update">

    <?= $this->render('update_form', [
        'model' => $model,
        'roleList' => $roleList,
    ]) ?>

</div>