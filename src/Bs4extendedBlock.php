<?php

namespace johnnymcweed\bs4extended;

use luya\cms\base\PhpBlock;

/**
 * Base block for all bootstrap 4 extended blocks.
 * 
 * @author Alex Schmid <alex.schmid@stud.unibas.ch>
 */
abstract class Bs4extendedBlock extends PhpBlock
{
	/**
	 * @inheritdoc
	 */
    public function getViewPath()
    {
        return  dirname(__DIR__) . '/src/views/blocks';
    }
}