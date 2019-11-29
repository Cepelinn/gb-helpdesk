<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Ticket */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="ticket-update_form">
    
<?php $form = ActiveForm::begin(['id' => 'upd-form',
										'class' => 'ticket-update_form',
										'fieldConfig' => [
											'template' => '{input}{error}',
											'options' => ['class' => 'form-group'],
    									],
										'errorCssClass' => 'error']);
		?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'responsibleName')->dropDownList($userList) ?>

    <?= $form->field($model, 'status_id')->dropDownList($statusList) ?>

    <div class="form-group">
        <?= Html::submitButton('Save changes', ['class' => 'btn btn__approve btn__uppercase']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
