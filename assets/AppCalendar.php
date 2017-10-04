<?php
/**
 * Created by PhpStorm.
 * User: alisochka
 * Date: 09.08.17
 * Time: 21:22
 */

namespace app\assets;
use yii\web\AssetBundle;

class AppCalendar extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/calendar/eventCalendar.css',
        'css/calendar/eventCalendar_theme_responsive.css',
    ];
    public $js = [
        'js/calendar/jquery.eventCalendar.js',
        'js/calendar/moment.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}