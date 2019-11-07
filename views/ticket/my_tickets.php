<?php
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?= $this->render('/profile/menu') ?>
<br>
<br>
<div class="">
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'ticket_min_view',
    ]);
    ?>
</div>