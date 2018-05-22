<?php
namespace johnnymcweed\bs4extended\blocks;

use johnnymcweed\bs4extended\Bs4extendedBlock;
use johnnymcweed\bs4extended\Module;
use luya\cms\frontend\blockgroups\MediaGroup;
use luya\cms\helpers\BlockHelper;
use luya\helpers\Json;

/**
 * Parallax Block.
 *
 * File has been created with `block/create` command. 
 */
class ParallaxBlock extends Bs4extendedBlock
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
        return MediaGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Parallax';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'image'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'title', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.title')],
                ['var' => 'caption', 'type' => self::TYPE_TEXTAREA, 'label' => Module::t('block_carousel.caption')],
                ['var' => 'image', 'type' => self::TYPE_IMAGEUPLOAD, 'label' => Module::t('block_carousel.image')],
                ['var' => 'alt', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_carousel.alt')],
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
            'image' => BlockHelper::imageUpload($this->getVarValue('image'), false, true),
            'id' => md5($this->getEnvOption('blockId')),
            'jsConfig' => $this->getJsConfig()
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '{% if extras.image %}<div>
              <img src="{{extras.image.source}}" class="img-fluid" />
      </div>{% endif %}';
    }
}