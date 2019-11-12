<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\user\UserRecord;

/* @var $this yii\web\View */
/* @var $searchModel app\models\user\UserSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-admin-user'
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