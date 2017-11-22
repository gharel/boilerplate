<?php
defined('_JEXEC') or die;
?>
<ul class="c-cta<?php echo $moduleclass_sfx ?>">
	<?php foreach ($list as $item) : ?>
		<?php $link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id); ?>
		<?php $name = htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>
		<?php $customcode = $item->custombannercode; ?>
		<?php $alt = $item->params->get('alt'); ?>
		<?php $alt = $alt ? $alt : $name; ?>
		<li class="c-cta__item">
			<a class="c-cta__link" href="<?php echo $link; ?>" title="<?php echo $name; ?>">
				<?php echo(!empty($customcode) ? $customcode : ''); ?>
				<?php echo(!empty($name) ? $name : ''); ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>