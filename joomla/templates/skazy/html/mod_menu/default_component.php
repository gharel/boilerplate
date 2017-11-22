<?php
defined('_JEXEC') or die;

$attributes = array();

if ($item->anchor_title) {
	$attributes['title'] = $item->anchor_title;
}

$attributes['class'] = 'o-menu__link ';
if ($item->anchor_css) {
	$attributes['class'] .= $item->anchor_css;
}

if ($item->anchor_rel) {
	$attributes['rel'] = $item->anchor_rel;
}

$linktype = $item->title;

if ($item->menu_image) {
	if ($item->menu_image_css) {
		$image_attributes['class'] = $item->menu_image_css;
		$linktype                  = JHtml::_('image', $item->menu_image, $item->title, $image_attributes);
	} else {
		$linktype = JHtml::_('image', $item->menu_image, $item->title);
	}

	if ($item->params->get('menu_text', 1)) {
		$linktype .= '<span class="image-title">' . $item->title . '</span>';
	}
}

if ($item->browserNav == 1) {
	$attributes['target'] = '_blank';
} elseif ($item->browserNav == 2) {
	$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes';

	$attributes['onclick'] = "window.open(this.href, 'targetWindow', '" . $options . "'); return false;";
}

$svg = '';
if($item->level == 1 && !$item->parent) {
	$svg = '<svg class="o-svg"><use xlink:href="#arrow" /></svg>';
}

echo JHtml::_('link', JFilterOutput::ampReplace(htmlspecialchars($item->flink, ENT_COMPAT, 'UTF-8', false)), $svg . $linktype, $attributes);
