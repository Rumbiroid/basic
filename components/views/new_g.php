<?php
/**
 * Created by PhpStorm.
 * User: alisochka
 * Date: 30.08.17
 * Time: 19:12
 */
use app\components\Functions;
use app\assets\AppAsset;
AppAsset::register($this);
//$this ->registerJsFile('@web/js/jquery-1.7.2.min.js',['position' => $this::POS_HEAD],'main-index');
//$this ->registerJsFile('@web/js/new_g/new_g.js',['position' => $this::POS_BEGIN],'main-index');
?>

<div id="slider-wrap">
    <div id="slider">
        <?php echo functions::show_new_product_w(); ?>
    </div>
</div>


