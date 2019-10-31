<?php
use yii\widgets\Menu;

?>
<?= Menu::widget([
    'items' => [
        ['label' => 'Проофиль', 'url' => ['/profile']],
        ['label' => 'Редактировать профиль', 'url' => ['profile/update']],
        ['label' => 'Мои обращения', 'url' => ['ticket/my-tickets']],
    ],
    'options' => [
                    'id'=>'navid',
                    'class' => 'navbar-nav',
                    'style'=>'float: left; font-size: 16px; list-style: none;',
                    'data'=>'menu',
                ],
    'activeCssClass'=>'active',
]); ?>