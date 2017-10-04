<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
//AppAsset::register($this);
//$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => './favicon.png']);
//$this ->registerJsFile('@web/js/new_g/new_g.js',['position' => $this::POS_BEGIN],'main-index');
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title><?= Html::encode($this->title) ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="f4dac6260032bfd6" />
    <?php $this->head() ?>
</head>
<body>
<div class="wrap">
    <?php $this->beginBody() ?>
    <?php Pjax::begin(); ?>
    <?php $this ->registerJsFile('@web/js/new_g/new_g.js',['position' => $this::POS_BEGIN],'main-index'); ?>
    <?php
    NavBar::begin([
        //'brandLabel' => Html::img('@web/img/headlogow.png', ['alt'=>'Rent4PS']),
        //'brandLabel' => 'Rent4PS',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
			['label' => 'Прокат', 'url' => ['/shop']],
            ['label' => 'Инструкция', 'url' => ['/site/instruction']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Написать нам', 'url' => ['/site/contact']],
            ['label' => 'Мои покупки', 'url' => 'https://www.oplata.info/delivery/delivery.asp'],
            /*
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )*/
        ],
    ]);
    NavBar::end();?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
    <?php Pjax::end(); ?>
</div>


<footer class="footer">
    <img class="img_logo" src="<?= Url::to('@web/img/headLogo.png') ?>" />
    <p class="pull-left">&copy; R4PS <?= date('Y')?></p>
    <ul class = "soc_buttons">
        <li><a href="http://www.twitter.com/ps4_games_rent" class="icon-twitter"></a></li>
        <li><a href="https://vk.com/club153474457" class="icon-vk"></a></li>
    </ul>
<!--    <span class="icon-user"></span>-->
        <script type='text/javascript'>
        (function(){ var widget_id = '3vm6m1CaaW';var d=document;var w=window;function l(){
            var s = document.createElement('script'); s.type = 'text/javascript';
            s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id;
            var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
            if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
            else{w.addEventListener('load',l,false);}}})();
        </script>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>

