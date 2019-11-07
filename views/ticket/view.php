<?php
$responsible;
if (!$model->responsible_id){
	$responsible = "Неопределен";
} else {
	$responsible = $model->responsible->name;
}
?>
<div class="ticket-view">
    <div class="ticket_view_block">
        <h1><?= $model->title ?></h1>
        <div class="view_ticket_description"><?= $model->description ?></div>
        <div class="view_ticket_status"><?= $model->status->title ?></div>
        <div class="view_ticket_responsible">Ответственный: <?= $responsible ?></div>
        <div class="view_ticket_created">Дата создания <?= $model->created_at ?></div>
		<div class="view_ticket_updated">Дата изменения <?= $model->updated_at ?></div>
    </div>

</div>