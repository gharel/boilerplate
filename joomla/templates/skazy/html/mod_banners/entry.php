<?php defined('_JEXEC') or die; ?>
<div class="c-entry<?php echo $moduleclass_sfx ?>">
	<div class="row">
		<?php foreach ($list as $item) : ?>
			<?php $link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id); ?>
			<?php $imageurl = $item->params->get('imageurl'); ?>
			<?php $description = $item->description; ?>
			<?php $name = $item->name; ?>
			<div class="c-entry__item col-md">
				<h3 class="c-entry__title"><?php echo $name; ?></h3>
				<?php echo(!empty($description) ? $description : ''); ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>