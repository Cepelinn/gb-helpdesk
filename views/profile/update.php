<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserRecord */

$this->title = 'Update user information';
$this->params['breadcrumbs'][] = ['label' => 'Profile overview', 'url' => ['/profile/index'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('menu') ?>

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

    	<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Name"]) ?>

    	<?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Email"]) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Save changes', ['class' => 'btn btn__approve btn__uppercase']) ?>
		</div>
		<?php ActiveForm::end(); ?>

    </div>