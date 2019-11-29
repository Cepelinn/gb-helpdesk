<?php
 
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Menu;

$this->title = 'Change user Password';
$this->params['breadcrumbs'][] = ['label' => 'Administration tools', 'url' => ['/admin'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/admin/admin-user'], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = ['label' => "Profile info", 'url' => ['view', 'id' => $userId], 'class' => 'breadcrumb_link'];
$this->params['breadcrumbs'][] = $this->title.' ('.$username.')';
?>

<?= Menu::widget([
    'items' => [
		['label' => 'Back to profile info', 'url' => ['/admin/admin-user/view', 'id' => $userId],'options'=>['class'=>'profile_menu-item']],
        ['label' => 'Update user information', 'url' => ['/admin/admin-user/update', 'id' => $userId],'options'=>['class'=>'profile_menu-item']],
    ],
    'options' => [
                    'id'=>'navid',
                    'class' => 'navbar-nav',
                    'data'=>'menu',
                ],
                'options' => ['class' => 'profile_menu'],
                'activeCssClass'=>'profile_menu-item__active',
]); ?>

<div class="user-record">

		<?php $form = ActiveForm::begin(['id' => 'change-form',
										'class' => 'user-record_form',
										'fieldConfig' => [
											'template' => '{input}{error}',
											'options' => ['class' => 'form-group'],
    									],
										'errorCssClass' => 'error']);
		?>

    	<?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "New password"]) ?>

    	<?= $form->field($model, 'newPasswordRepeat')->passwordInput(['maxlength' => true, 'class' => 'input', 'placeholder' => "Repeat password"]) ?>

    	<div class="form-group">
    		<?= Html::submitButton('Change password', ['class' => 'btn btn__approve btn__uppercase']) ?>
		</div>
		<?php ActiveForm::end(); ?>

    </div>