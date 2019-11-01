<?php
?>
<?= $this->render('menu') ?>
<br>
<br>
<div class="user-view">
    <div class="user_view_block">
        <h1><?= $model->name ?></h1>
        <div class="view_user_username"><?= $model->username ?></div>
        <div class="view_user_email"><?= $model->email ?></div>
        <div class="view_user_created">Дата регистрации:<?= $model->created_at ?></div>
    </div>

</div>