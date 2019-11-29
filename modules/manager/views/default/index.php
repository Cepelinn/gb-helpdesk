<?php
    use yii\widgets\Menu;

    $this->title = 'Management tools';
    $this->params['breadcrumbs'][] = $this->title;
?>

<?= Menu::widget([
    'items' => [
        ['label' => 'Tickets management', 'url' => ['/manager/ticket-management'],'options'=>['class'=>'profile_menu-item']],
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