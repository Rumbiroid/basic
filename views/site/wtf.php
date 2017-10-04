<?php
/**
 * Created by PhpStorm.
 * User: alisochka
 * Date: 30.08.17
 * Time: 19:12
 */
use app\components\Functions;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$this ->registerJsFile('@web/js/pushy_js/pushy.min.js',['position' => $this::POS_END],'main-index');
$this ->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js',['position' => $this::POS_HEAD],'main-index');
$this->registerCssFile('@web/css/puchy_css/demo.css');
$this->registerCssFile('@web/css/puchy_css/normalize.css');
$this->registerCssFile('@web/css/puchy_css/pushy.css');


?>
<style>
.icon-leanpub:hover {color:red}
</style>
<body>
<nav class="pushy pushy-left" data-focus="#first-link">
    <div class="pushy-content">
        <?php echo functions::show_goods_group(true); ?>
    </div>
</nav>

<div id="container">
    <button class="menu-btn">&#9776;Категории </button>
</div>
<a class = "icon-left-open"></a>
<?= 
  GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'firstname',
            'email:email',
            'created_at:datetime',
            'subscriptions:Html',
            'status_word',
            [
                'class' => 'yii\grid\ActionColumn',
                
            ],
        ],
    ]); ?>

        
</body>















