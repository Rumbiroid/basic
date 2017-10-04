<?php
/* @var $this yii\web\View */
use app\components\Functions;
$this-> title = functions::show_content_id_name();
$this->registerMetaTag(['name' => 'description','content' => 'Информация об игре, цена, условия проката']);
$this->registerMetaTag(['name' => 'keywords','content' => 'Купить игру, информация об игре, условия проката']);
$this->params['breadcrumbs'][] = $this->title;
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => './favicon.png']);
?>
<style>
.icon-left {font-size:25px;}
.icon-left:hover {text-decoration:none}
</style>

<a class = "cat icon-left" href="./shop"></a>
<div class="product_info"><?php echo functions::show_content_id();?></div>


