<?php
/* @var $this yii\web\View */
use app\components\Functions;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'R4PS:Поиск игры';
$this->registerMetaTag(['name' => 'description','content' => 'Искать игру по наименованию']);
$this->registerMetaTag(['name' => 'keywords','content' => 'Поиск игры в прокат, искать игру']);
$this->params['breadcrumbs'][] = $this->title;
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => './favicon.png']);
?>


<?php
functions::get_current_page();

$form = ActiveForm::begin([
    'id' => 'search-form',
    'options' => ['class' => 'form-horizontal'],
    'action' => './search',
    'method' => 'get',
    //'layout' => 'horizontal',
]) ?>

<div class="body-content">
    <div class="search_row">
        <div class="search_form">
            <?= $form->field($model, 'text')->textInput(['autofocus' => true])->label('')?>
        </div>
        <div class="search_button" style="text-align: center">
            <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
    <?php
    echo functions::show_content_sr();
    ?>
</div>

