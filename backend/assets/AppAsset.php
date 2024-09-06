<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets';

    public $css = [
        'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        'css/site.css',
        'fancybox/fancybox.min.css',
    ];

    public $js = [
        'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js',
        'ckeditor/ckeditor.js',
        'ckfinder/ckfinder.js',
        'fancybox/fancybox.min.js',
        'js/sortable.js',
        'js/main.js',
        'js/fileManager.js',
        'js/ckeditor.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];

    public function init()
    {
//        $this->registerJs['data'] = [
//            'ckFinderLicenseName' => \Yii::$app->params['ckFinderLicenseName'],
//            'ckFinderLicenseKey' => \Yii::$app->params['ckFinderLicenseKey']
//        ];

        parent::init(); // TODO: Change the autogenerated stub
    }
}
