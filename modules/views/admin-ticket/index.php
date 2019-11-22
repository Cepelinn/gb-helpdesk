<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets Administration tools';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ticket-index">

<?= Menu::widget([
    'items' => [
        ['label' => 'Back to administration tools', 'url' => ['/admin'],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Create new ticket', 'url' => ['/admin/admin-ticket/create'],'options'=>['class'=>'profile_menu-item']],
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
    
    <span>!!По запросу "не определен" в фильтре Responsible Name будут отображены заявки без исполнителя!!</span>

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
                'attribute' => 'title',
                'label' => 'Title',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a(
                        $data->title,
                        ['/admin/admin-ticket/view', 'id' => $data->id],
                        [
                            'title' => $data->title,
                        ]
                    );
                }
            ],
            'description',
            'authorName',
            'responsibleName',
            //'responsible_id',
            'statusName',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
