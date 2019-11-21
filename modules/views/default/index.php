<?php
    use yii\widgets\Menu;
?>

<?= Menu::widget([
    'items' => [
        ['label' => 'Users management', 'url' => ['/admin/admin-user'],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Tickets management', 'url' => ['/admin/admin-ticket'],'options'=>['class'=>'profile_menu-item']],
    ],
    'options' => [
                    'id'=>'navid',
                    'class' => 'navbar-nav',
                    'style'=>'float: left; font-size: 16px; list-style: none;',
                    'data'=>'menu',
    ],
                'options' => ['class' => 'profile_menu'],
                'activeCssClass'=>'profile_menu-item__active',
]); ?>