<?php

namespace johnnymcweed\bs4extended\assets;

use luya\web\Asset;
/**
 * Application Asset File.
 */
class Bs4extendedAsset extends Asset
{
    public $sourcePath = '@bs4extended/resources';

    public $css = [
        'css/parallax.css'
    ];

    public $js = [
        'js/parallax.min.js'
    ];

    public $depends = [
        'app\assets\ResourcesAsset'
    ];
}
