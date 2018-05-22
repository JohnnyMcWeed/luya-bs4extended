<?php
namespace johnnymcweed\bs4extended\blocks;

use johnnymcweed\bs4extended\Bs4extendedBlock;
use johnnymcweed\bs4extended\Module;
use luya\bootstrap4\blockgroups\BootstrapGroup;
use luya\cms\frontend\blockgroups\MediaGroup;
use luya\cms\helpers\BlockHelper;
use luya\helpers\Json;

/**
 * Parallax Block.
 *
 * File has been created with `block/create` command. 
 */
class AnimateOnScrollBlock extends Bs4extendedBlock
{
    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;
    
    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return BootstrapGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return Module::t('block_animate_on_scroll.module_name');
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'image';
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                
            ],
            'cfgs' => [
                
            ]
        ];
    }

    /**
     * Build the json encoded javascript config
     *
     * @return string
     */
    public function getJsConfig()
    {
        return Json::encode([]);
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'id' => md5($this->getEnvOption('blockId')),
            'jsConfig' => $this->getJsConfig()
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '';
    }
}