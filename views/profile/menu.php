<?php
use yii\widgets\Menu;

?>
<?= Menu::widget([
    'items' => [
        ['label' => 'Profile overview', 'url' => ['/profile/index'],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Edit profile', 'url' => ['profile/update'],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Change password', 'url' => ['/profile/password-change'],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'My tickets', 'url' => ['ticket/my-tickets'],'options'=>['class'=>'profile_menu-item']],
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