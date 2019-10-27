<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserRecord */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'User Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="user-record-form">

    	<?php $form = ActiveForm::begin(); ?>

    	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    	<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    	</div>

    	<?php ActiveForm::end(); ?>

    </div>

</div>
