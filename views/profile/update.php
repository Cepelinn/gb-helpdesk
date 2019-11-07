<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserRecord */

$this->title = 'Update User';
?>
<?= $this->render('menu') ?>
<br>
<br>
<div class="user-record-update">

    <div class="user-record-form">

    	<?php $form = ActiveForm::begin(['id' => 'upd-form']); ?>

    	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= Html::a("Изменить пароль", ['profile/password-change']); ?>

    	<div class="form-group">
    		<?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
    	</div>

    	<?php ActiveForm::end(); ?>

    </div>

</div>