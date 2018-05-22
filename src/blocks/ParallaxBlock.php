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
        return Module::t('block_parallax.module_name');
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
                ['var' => 'title', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_parallax.title')],
                ['var' => 'caption', 'type' => self::TYPE_TEXTAREA, 'label' => Module::t('block_parallax.caption')],
                ['var' => 'image', 'type' => self::TYPE_IMAGEUPLOAD, 'label' => Module::t('block_parallax.image')],
                ['var' => 'alt', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_parallax.alt')],
            ],
            'cfgs' => [
                [ 'var' => 'speed', 'type' => self::TYPE_DECIMAL, 'label' => Module::t('block_parallax.config_speed'), 'initvalue' => 0.2 ],
                [ 'var' => 'bleed', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_parallax.config_bleed'), 'initvalue' => 50 ],
                [ 'var' => 'zIndex', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_parallax.config_zIndex') ],
                [ 'var' => 'posX', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_parallax.config_posX'), 'initvalue' => 'center'],
                [ 'var' => 'posY', 'type' => self::TYPE_TEXT, 'label' => Module::t('block_parallax.config_posY'), 'initvalue' => 'center'],
                [ 'var' => 'overScrollFix', 'type' => self::TYPE_CHECKBOX, 'label' => Module::t('block_parallax.config_overScrollFix'), 'initvalue' => '1' ],
                //[ 'var' => 'excludeAgents', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_parallax.config_excludeAgents') ],
                //[ 'var' => 'aspectRatio', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_parallax.config_aspectRatio') ],
                //[ 'var' => 'mirrorSelector', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_parallax.config_mirrorSelector') ],
                //[ 'var' => 'afterRefresh', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_parallax.config_afterRefresh') ],
                //[ 'var' => 'afterRender', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_parallax.config_afterRender') ],
                //[ 'var' => 'afterSetup', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_parallax.config_afterSetup') ],
                //[ 'var' => 'afterDestroy', 'type' => self::TYPE_NUMBER, 'label' => Module::t('block_parallax.config_afterDestroy') ],
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
        return Json::encode([
            'src' => BlockHelper::imageUpload($this->getVarValue('image'), false,true)->source,
            'speed' => $this->getCfgValue('speed', 0.2),
            'bleed' => $this->getCfgValue('bleed', 0)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            //'image' => isset($item['image']) ? BlockHelper::imageUpload($item['image'], false, true) : null,
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