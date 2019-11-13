<?php
 
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<?= $this->render('menu') ?>

<div class="user-record">

		<?php $form = ActiveForm::begin(['id' => 'change-form',
										'class' => 'user-record_form',
										'fieldConfig' => [
											'template' => '{input}{error}',
											'options' => ['class' => 'form-group'],
    									],
										'errorCssClass' => 'error']);
		?>

		<?= $form->field($model, 'currentPassword')->passwordInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Current password"])?>

    	<?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "New password"]) ?>

    	<?= $form->field($model, 'newPasswordRepeat')->passwordInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Repeat password"]) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Change password', ['class' => 'btn btn__approve btn__uppercase']) ?>
		</div>
		<?php ActiveForm::end(); ?>

    </div>