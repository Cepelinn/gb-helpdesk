<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="login">

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

            <?= $form->field($model, 'rememberMe')->checkbox(['template' => '{input}{label}', 'class' => 'styled-checkbox']) ?>

            <div class="form-group">
                <?= Html::submitButton('Log in', ['class' => 'btn btn__approve btn__uppercase']) ?>
            </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
