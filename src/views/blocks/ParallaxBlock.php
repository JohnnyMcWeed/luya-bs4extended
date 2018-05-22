<?php
/* @var $this \luya\cms\base\PhpBlockView */
use johnnymcweed\bs4extended\assets\Bs4extendedAsset;

Bs4extendedAsset::register($this->appView);

$this->appView->registerJs("$('#".$this->extraValue('id')."').parallax(".$this->extraValue('jsConfig').");");
?>
<div id="<?= $this->extraValue('id') ?>" 
     class="parallax-window">
</div>