<?php
/* @var $this yii\web\View */
use app\components\CalendarWidget;
use app\components\New_gWidget;
use app\assets\AppCalendar;
AppCalendar::register($this);
$this->title = 'Прокат Аренда игр PS4';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Новинки проката игр PS4, Новости, Календарь график выхода игр PS4'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Календарь выхода игр PS4 Playstation 4,Новинки проката,Новости игр, Прокат Аренда игр'
]);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => './favicon.png']);
?>
<div class="site-index">
    <div class="body-content">
        <div class="jumbotron" style="margin-bottom: 10px">
            <h1>rent4ps</h1>
            <h5 class="lead">Горячие новинки и хиты для Play Station 4 в прокат</h5>
            <a class="btn btn-lg btn-success" href="/shop">Перейти к просмотру</a>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Календарь выхода игр на PS4</h2>
                <?=CalendarWidget::widget();?>
            </div>

            <div class="col-lg-4">
                <h2>Новинки PS4</h2>
                <div class="new_g">
                    <?=New_gWidget::widget()?>
                </div>
            </div>

            <div class="col-lg-4">
                <h2>Игровые новости</h2>
                <div class="twitter">
                <a class="twitter-timeline"
                   data-widget-id="896781611953512448"></a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id))
                {js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(
                    document,"script","twitter-wjs");</script>
                </div>
            </div>
        </div>
    </div>
</div>


