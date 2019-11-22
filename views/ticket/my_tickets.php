<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'My tickets';
$this->params['breadcrumbs'][] = ['label' => 'Profile overview', 'url' => ['/profile/index'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = $this->title;

?>
<?= $this->render('/profile/menu') ?>
<br>
<br>
<div class="">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{summary}<div class=\'ticket-card_container\'>{items}</div>',
        'emptyText' => "There is no tickets here",
        'itemView' => '_ticket_min_view',
        'itemOptions' => [
            'tag' => false,
        ],
    ]);
    ?>
</div>