<?php


namespace app\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css',
        'https://use.fontawesome.com/releases/v5.0.7/css/all.css'
    ];
    public $js = [
        'https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js',        
        '/ckeditor/ckeditor.js',
        '/ckfinder/ckfinder.js',
        '/js/main.js'
    ];
}