<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700',
        'https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css',
        'css/vendors.css',
        'css/app-lite.css',
        'css/core/menu/menu-types/vertical-menu.css',
        'css/core/colors/palette-gradient.css',
        'css/pages/dashboard-ecommerce.css'
    ];
    public $js = [
        'js/vendors.min.js',
        'js/core/app-menu-lite.js',
        'js/core/app-lite.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
