<?php defined('_JEXEC') or die; ?>
<div class="o-lang<?php echo $moduleclass_sfx; ?>">
	<div class="dropdown">
		<?php foreach ($list as $language) : ?>
			<?php if ($language->active) : ?>
				<a href="#" class="o-lang__show dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php if ($language->image) : ?>
						&nbsp;<?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array('title' => $language->title_native, 'class' => 'o-lang__img'), true); ?>
					<?php endif; ?>
					<svg class="o-svg o-lang__svg">
						<use xlink:href="#arrow"></use>
					</svg>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
			<?php foreach ($list as $language) : ?>
				<?php if (!$language->active || $params->get('show_active', 0)) : ?>
					<a href="<?php echo $language->link; ?>" class="dropdown-item <?php echo $language->active ? ' class="active"' : ''; ?>">
						<?php if ($language->image) : ?>
							<?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array('title' => $language->title_native, 'class' => 'o-lang__img'), true); ?>
						<?php endif; ?>
						<?php echo $language->title_native; ?>
					</a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
