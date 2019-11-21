<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">
<div class="wrapper_content">
    <div class="navbar">
        <div class="container navbar_container">
            <a href='<? echo Yii::$app->homeUrl; ?>' class="logo">
                <img class="logo_img" src="<?php echo Url::to('@web/web/img/logo.svg'); ?>" />
                <span class="logo_text">GB Helpdesk</span>
            </a>
    <?php

        echo Menu::widget([
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index'],'options'=>['class'=>'navbar_menu-item']],
                    ['label' => 'About', 'url' => ['/site/about'],'options'=>['class'=>'navbar_menu-item']],
                    ['label' => 'Contact', 'url' => ['/site/contact'],'options'=>['class'=>'navbar_menu-item']],
                    ['label' => 'Add ticket',
                        'url' => ['/ticket/add'],
                        'options'=>['class'=>'navbar_menu-item'],
                        'visible' => !Yii::$app->user->isGuest
                        ],
                        [
                        'label' => 'Profile',
                        'url' => ['/profile/index'],
                        'options' => ['class' => 'navbar_menu-item'],
                        'visible' => !Yii::$app->user->isGuest
                        ],
                        ['label' => 'Administration tools', 'url' => ['/admin\/'], 'items' => [
                            ['label' => 'Users', 'url' => ['/admin/admin-user',],'options'=>['class'=>'navbar_menu-sub-item']],
                            ['label' => 'Tickets', 'url' => ['/admin/admin-ticket'],'options'=>['class'=>'navbar_menu-sub-item'] ],
                        ],
                        'template' => '<a href={url} class=\'sublabel\'>{label}</a>',
                        'options'=>['class'=>'navbar_menu-item navbar_menu-item__sub'],
                        'visible' =>  (!Yii::$app->user->isGuest && Yii::$app->user->can('admin'))
                        ],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login'],'options'=>['class'=>'navbar_menu-item']]
                    :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'options' => ['class' => 'navbar_menu-item'],
                        'template' => '<a href="{url}" class="url-class" data-method = "post">{label}</a>',
                        'linkOptions' => ['data-method' => 'post']
                        ],
                        ['label' => 'Register',
                        'url' => ['/site/registration'],
                        'options' => ['class' => 'navbar_menu-item'],
                        'visible' => Yii::$app->user->isGuest
                        ],
                ],
                'options' => ['class' => 'navbar_menu'],
                'activeCssClass'=>'navbar_menu-item__active',
            ]
        )
    ?>
            </div>
        </div>

        <div class="breadcrumbs">
            <div class="container breadcrumb_container">
                <h1 class="page_title"><? echo $this->title ?></h1>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'homeLink' => [
                        'label' => 'Home',
                        'url' => '/site/index',
                        'class' => 'breadcrumb_link'
                    ],
                    'activeItemTemplate' => "<li class=\"breadcrumb_active\">{link}</li>\n"
                ]) ?>
                <?= Alert::widget() ?>
                
            </div>
        </div>
        <div class="container">
            <?= $content ?>
        </div>
    </div>
    <footer class="footer">
            <div class="container footer_container">
                <p class="pull-left">&copy; GB Helpdesk <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
    </footer>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
