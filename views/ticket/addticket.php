<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserRecord */

$this->title = 'Create Ticket';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-ticket__container">

    <div class="ticket-add">

	<?php $form = ActiveForm::begin(['class' => 'ticket-add_form',
										'fieldConfig' => [
											'template' => '{input}{error}',
											'options' => ['class' => 'form-group'],
    									],
										'errorCssClass' => 'error']);
		?>

    	<?= $form->field($model, 'title')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Title"]) ?>
		<?= $form->field($model, 'description')->textarea(['maxlength' => true, 'class' => 'textarea', 'placeholder' => "Description"]) ?>
		<?= $form->field($model, 'author_id',['template' => '{input}'])->hiddenInput(['value' => Yii::$app->user->id]) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Create ticket', ['class' => 'btn btn__approve btn__uppercase']) ?>
    	</div>

    	<?php ActiveForm::end(); ?>

	</div>
</div>