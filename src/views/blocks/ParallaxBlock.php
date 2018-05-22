<?php
/* @var $this \luya\cms\base\PhpBlockView */

johnnymcweed\bs4extended\assets\Bs4extendedAsset::register($this);

$this->registerJs("$('#".$this->extraValue('id')."').parallax(".$this->extraValue('jsConfig').");");
?>
<div id="<?= $this->extraValue('id') ?>" class="parallax-window" data-parallax data-image-src="<?= $this->extraValue('image')->source ?>">
</div>