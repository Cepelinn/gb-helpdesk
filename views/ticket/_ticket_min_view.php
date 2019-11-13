<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\DetailView;

$responsible;
if (!$model->responsible_id){
	$responsible = "Неопределен";
} else {
	$responsible = $model->responsible->name;
}

?>

<div class="ticket-card" data-key="<?= $model->id; ?>">
	<div class="ticket-card_header">
		<a href="" class="ticket-card_title">
			<?= $model->title ?>
		</a>
	</div>
	<p class="ticket-card_description"><?= $model->description ?></p>
	<span class='ticket-card_created-at'>Created at: <?= $model->created_at ?></span>
</div>
