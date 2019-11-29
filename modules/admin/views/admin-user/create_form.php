<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="user-record">

		<?php $form = ActiveForm::begin(['id' => 'upd-form',
										'class' => 'user-record_form',
										'fieldConfig' => [
											'template' => '{input}{error}',
											'options' => ['class' => 'form-group'],
    									],
										'errorCssClass' => 'error']);
		?>

		<?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Username"])?>
		<?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'input', 'placeholder' => 'Password']) ?>

    	<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Name"]) ?>

    	<?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Email"]) ?>
        
        <?= $form->field($model, 'roleName')
                ->dropDownList($roleList) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Save', ['class' => 'btn btn__approve btn__uppercase']) ?>
		</div>
		<?php ActiveForm::end(); ?>
    </div>