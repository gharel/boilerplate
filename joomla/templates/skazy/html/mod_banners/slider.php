<?php
defined('_JEXEC') or die;
?>
<div class="c-slider<?php echo $moduleclass_sfx ?> js-slider">
	<?php foreach ($list as $item) : ?>
		<?php $link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id); ?>
		<?php $name = htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>
		<?php $imageurl = $item->params->get('imageurl'); ?>
		<?php $description = $item->description; ?>
		<?php $alt = $item->params->get('alt'); ?>
		<?php $alt = $alt ? $alt : $name; ?>
		<div class="c-slider__item" style="background-image: url('<?php echo $imageurl; ?>');">
			<div class="c-slider__content">
				<?php echo(!empty($description) ? $description : ''); ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>