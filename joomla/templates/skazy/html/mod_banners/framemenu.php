<?php defined('_JEXEC') or die; ?>
<div class="c-frame<?php echo $moduleclass_sfx ?>">
	<div class="row no-gutters">
		<?php foreach ($list as $item) : ?>
			<?php $name = $item->name; ?>
			<?php $link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id); ?>
			<?php $imageurl = $item->params->get('imageurl'); ?>
			<?php $description = $item->description; ?>
			<div class="c-frame__item col-md">
				<h3 class="c-frame__title"><?php echo $name; ?></h3>
				<a href="<?php echo $link; ?>" class="c-frame__link">
					<img class="c-frame__bg" src="<?php echo $imageurl; ?>" alt="" />
					<?php echo(!empty($description) ? $description : ''); ?>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>