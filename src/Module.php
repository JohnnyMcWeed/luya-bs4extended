<?php

namespace johnnymcweed\bs4extended;

/**
 * Bs4Extended Module
 *
 * @author Alex Schmid <alex.schmid@stud.unibas.ch>
 */
class Module extends \luya\base\Module
{
    /**
     * @inheritdoc
     */
    public static function onLoad()
    {
        self::registerTranslation('bs4extended*', static::staticBasePath() . '/messages', [
            'fileMap' => [
                'bs4extended' => 'bs4extended.php',
            ],
        ]);
    }
    
    /**
     * Translations
     *
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('bs4extended', $message, $params);
    }
}
