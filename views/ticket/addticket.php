<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user\UserRecord */

$this->title = 'Create Ticket';
$this->params['breadcrumbs'][] = ['label' => 'User Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-ticket__container">

    <h1 class='page-title'><?= Html::encode($this->title) ?></h1>

    <div class="add-ticket__form">

    	<?php $form = ActiveForm::begin(); ?>

    	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
		<?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
		<?= $form->field($model, 'author_id',['template' => '{input}'])->hiddenInput(['value' => Yii::$app->user->id]) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Create ticket', ['class' => 'btn btn-success btn-block']) ?>
    	</div>

    	<?php ActiveForm::end(); ?>

    </div>