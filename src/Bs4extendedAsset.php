<?php

namespace johnnymcweed\assets;

/**
 * Application Asset File.
 */
class Bs4extendedAsset extends \luya\web\Asset
{
    public $sourcePath = '@app/resources';

    public $css = [];

    public $js = [
        '/js/parallax.min.js'
    ];

    public $publishOptions = [
        'only' => [
            'css/*',
            'js/*',
        ]
    ];

    public $depends = [
        'luya\bootstrap4\Bootstrap4Asset'
    ];
}
