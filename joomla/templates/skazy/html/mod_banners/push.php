<?php defined('_JEXEC') or die; ?>
<div class="c-push<?php echo $moduleclass_sfx ?>">
	<?php
	$document = JFactory::getDocument();
	$renderer = $document->loadRenderer('modules');
	$options  = array('style' => 'none');
	echo $renderer->render('push-weather', $options, null);
	?>
	<?php if ($headerText) : ?>
		<div class="c-push__head">
			<?php echo $headerText; ?>
		</div>
	<?php endif; ?>
	<div class="row">
		<?php foreach ($list as $item) : ?>
			<?php $link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id); ?>
			<?php $imageurl = $item->params->get('imageurl'); ?>
			<?php $description = $item->description; ?>
			<div class="c-push__item col-lg col-md-6">
				<img class="c-push__img" src="<?php echo $imageurl; ?>" alt="" />
				<?php echo(!empty($description) ? $description : ''); ?>
				<a class="btn o-btn o-btn--primary" href="<?php echo $link; ?>">Réservez maintenant</a>
			</div>
		<?php endforeach; ?>
	</div>
</div>