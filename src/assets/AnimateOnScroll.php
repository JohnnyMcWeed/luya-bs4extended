<?php

namespace johnnymcweed\bs4extended\assets;

use luya\web\Asset;
/**
 * Application Asset File.
 */
class AnimateOnScrollAsset extends Asset
{
    public $sourcePath = '@bs4extended/resources';

    public $css = [
        'css/animate-on-scroll.css'
    ];

    public $js = [
        'js/animate-on-scroll.min.js'
    ];

    public $depends = [
        'app\assets\ResourcesAsset'
    ];
}
