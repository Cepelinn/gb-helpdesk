<?php
?>
<?= $this->render('menu') ?>

<div class="user-view">
        <h2 class="block-title">User information summary</h2>
        <ul class='user-view_summary'>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Username:&nbsp;</span><?= $model->username ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Email:&nbsp;</span><?= $model->email ?>
            </li>
            <li class='user-view_summary-menu-item'>
                <span class='user-view_summary-category'>Registration Data:&nbsp;</span><?= $model->created_at ?>
            </li>
        </ul>
</div>