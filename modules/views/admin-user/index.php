<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;

use app\models\user\UserRecord;

/* @var $this yii\web\View */
/* @var $searchModel app\models\user\UserSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users Administration tools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-record-index">

<?= Menu::widget([
    'items' => [
        ['label' => 'Back to administration tools', 'url' => ['/admin'],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Create new user', 'url' => ['/admin/admin-user/create'],'options'=>['class'=>'profile_menu-item']],
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
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'tableOptions' => [
            'class' => 'data-table'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'username',
                'label' => 'UserName',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a(
                        $data->username,
                        ['/admin/admin-user/view', 'id' => $data->id],
                        [
                            'title' => $data->username,
                        ]
                    );
                }
            ],
            //'password',
            //'authKey',
            //'accessToken',
            'name',
            'email:email',
            'created_at',
            'updated_at',
            'roleName',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>