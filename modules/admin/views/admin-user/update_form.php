<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="user-update_form">

		<?php $form = ActiveForm::begin(['id' => 'upd-form',
										'class' => 'user-update_form',
										'fieldConfig' => [
											'template' => '{input}{error}',
											'options' => ['class' => 'form-group'],
    									],
										'errorCssClass' => 'error']);
		?>

		<?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Username"])?>

    	<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Name"]) ?>

    	<?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Email"]) ?>
        
        <?= $form->field($model->role, 'item_name')
                ->dropDownList($roleList) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Save changes', ['class' => 'btn btn__approve btn__uppercase']) ?>
		</div>
		<?php ActiveForm::end(); ?>
    </div>