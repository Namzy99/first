<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/plugins/bootstrap/css/bootstrap.min.css',
        'css/css/style.css',
        'css/css/colors/blue.css',
        'assets/plugins/remodal/remodal.css',
        'assets/plugins/remodal/remodal-default-theme.css',
        'assets/plugins/progress/mprogress.min.css',
    ];
    public $js = [
        "assets/plugins/jquery/jquery.min.js",
        "https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js",
        "assets/plugins/bootstrap/js/tether.min.js",
        "assets/plugins/bootstrap/js/bootstrap.min.js",
        "js/jquery.slimscroll.js",
        "js/waves.js",
        "js/sidebarmenu.js",
        "assets/plugins/sticky-kit-master/dist/sticky-kit.min.js",
        "js/custom.min.js",
        "assets/plugins/flot/jquery.flot.js",
        "assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js",
        "js/flot-data.js",
        "assets/plugins/styleswitcher/jQuery.style.switcher.js",
        "assets/plugins/remodal/remodal.min.js",
        "assets/plugins/progress/mprogress.min.js"
    ];
    public $depends = [
       'yii\web\YiiAsset',
    ];
}
