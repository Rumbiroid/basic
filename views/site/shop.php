<?php
 
/* @var $this yii\web\View */
use app\components\Functions;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);
$this->title = 'Прокат игр для PlayStation 4';
$this->registerMetaTag(['name' => 'description','content' => 'Прокат аренда игр для PS4 Playstation 4']);
$this->registerMetaTag(['name' => 'keywords','content' => 'Файтинги, Ролевые, RPG, Экшн, Приключения']);
$this->params['breadcrumbs'][] = $this->title;
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => './favicon.png']);
//$this ->registerJsFile('@web/js/pushy_js/pushy.js',['position' => $this::POS_END],'main-index');
//$this ->registerJsFile('@web/js/jquery.min.js',['position' => $this::POS_HEAD],'main-index');
//$this->registerCssFile('@web/css/puchy_css/pushy.css');
//$this->registerCssFile('@web/css/pagination.css');
?>




<div class="site-index">
    <?php
    $form = ActiveForm::begin([
        'id' => 'search-form',
        'options' => ['class' => 'form-horizontal'],
        'action' => './search',
        'method' => 'get',
        //'layout' => 'horizontal',
    ]) ?>
    <div class="search_row">
        <div class="search_form">
            <?= $form->field($model, 'text')->textInput(['autofocus' => true])->label('')?>
        </div>
        <div class="search_button" style="text-align: center">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
<div id = "container">

    <nav class="pushy pushy-left" data-focus="#first-link">
        <ul class="pushy-content">
            <?php echo functions::show_goods_group(true); ?>
        </ul>
    </nav>
         <button class="menu-btn">&#9776;Категории</button>
<div class="col-3-4" style="padding-top: 10px">
    <?php functions::get_current_page();?>
    <?php echo functions::show_content(); ?>
</div>

</div>
</div>
