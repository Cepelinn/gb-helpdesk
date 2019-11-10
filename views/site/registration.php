<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserRecord */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-record-create">

    <!-- <h1 class='page-title'><?= Html::encode($this->title) ?></h1> -->

    <div class="registration">

		<?php $form = ActiveForm::begin(['id' => 'reg-form',
										'class' => 'registration_form',
										'fieldConfig' => [
											'template' => '{input}{error}',
											'options' => ['class' => 'form-group'],
    									],
										'errorCssClass' => 'error']);
		?>

		<?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Username"])?>

    	<?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Password"]) ?>

    	<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Name"]) ?>

    	<?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Email"]) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Register', ['class' => 'btn btn__approve btn__uppercase']) ?>
    	</div>

    	<?php ActiveForm::end(); ?>

	</div>

</div>
