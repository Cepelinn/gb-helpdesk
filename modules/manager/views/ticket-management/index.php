<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets management';
$this->params['breadcrumbs'][] = ['label' => 'Manager', 'url' => ['/manager'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="ticket-index">
    
    <span>!!По запросу "не определен" в фильтре Responsible Name будут отображены заявки без исполнителя!!</span>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
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
