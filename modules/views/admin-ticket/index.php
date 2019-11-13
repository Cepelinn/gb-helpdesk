<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a('Общий контроль', ['/admin']);?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
      <span>!!По запросу "не определен" в фильтре Responsible Name будут отображены заявки без исполнителя!!</span>
      <br>
      <br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
