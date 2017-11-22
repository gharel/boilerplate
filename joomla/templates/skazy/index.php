<?php
defined('_JEXEC') or die('Restricted access');

$app         = JFactory::getApplication();
$doc         = JFactory::getDocument();
$user        = JFactory::getUser();
$lang        = JFactory::getLanguage();
$codelang    = substr($lang->getTag(), 0, 2);
$params      = $app->getTemplate(true)->params;
$option      = $app->input->getCmd('option', '');
$view        = $app->input->getCmd('view', '');
$layout      = $app->input->getCmd('layout', '');
$task        = $app->input->getCmd('task', '');
$itemid      = $app->input->getCmd('Itemid', '');
$sitename    = $app->get('sitename');
$menu        = $app->getMenu();
$home        = $app->getMenu()->getDefault()->link . '&Itemid=' . $app->getMenu()->getDefault()->id;
$dirtpl      = JURI::base() . '/templates/' . $this->template;
$dirimg      = $dirtpl . "/dist/img/";
$urlhome     = JRoute::_($home);
$urlCSS      = $dirtpl . '/dist/css/main.css';
$urlJS       = $dirtpl . '/dist/js/main.js';
$urlGA       = $dirtpl . '/dist/js/google-analytics.js';
$bodyclasses = $option . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout') . ($task ? ' task-' . $task : ' no-task') . ($itemid ? ' itemid-' . $itemid : '');

$this->baseurl   = JURI::base();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// remove old jQuery and Bootstrap
unset($this->_scripts[JURI::root(true) . '/media/jui/js/jquery.min.js']);
unset($this->_scripts[JURI::root(true) . '/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[JURI::root(true) . '/media/jui/js/jquery-migrate.min.js']);
unset($this->_scripts[JURI::root(true) . '/media/jui/js/bootstrap.min.js']);

// Set URL of main JS and CSS file concatenate with jQuery and Bootstrap
JHtml::_('stylesheet', $urlCSS, array('version' => 'auto'));
JHtml::_('script', $urlJS, array('version' => 'auto'));
?>
<!DOCTYPE html>
<html class="no-js" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<?php // see https://fonts.google.com/specimen/Montserrat?selection.family=Montserrat:300|Rubik:300,400,500,700|Source+Sans+Pro:200,300,400,600 ?>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300|Rubik:300,400,500,700|Source+Sans+Pro:200,300,400,600" rel="stylesheet">
	<jdoc:include type="head" />
	<?php $this->SetGenerator(null); ?>
</head>
<body class="<?php echo $bodyclasses; ?>">
	<div class="d-none">
		<?php include_once('dist/svg/sprite.svg'); ?>
	</div>
	<?php if ($this->countModules('nav')) : ?>
		<nav class="o-menu js-menu" role="navigation">
			<jdoc:include type="modules" name="nav" style="none" />
		</nav>
	<?php endif; ?>
	<div class="o-page">
		<header class="o-header">
			<?php if ($this->countModules('nav')) : ?>
				<div class="container">
					<div class="row">
						<div class="col">
							<a href="#" class="o-menu__show js-show-menu" role="button">
								<span class="o-menu__bar"></span>
								<span class="o-menu__bar"></span>
								<span class="o-menu__bar"></span>
								<span class="o-menu__bar"></span>
							</a>
						</div>
						<div class="col">
							<jdoc:include type="modules" name="header" style="none" />
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="o-branding">
				<div class="container">
					<a class="o-logo" href="<?php echo $urlhome; ?>">
						<img src="<?php echo $dirimg; ?>logo-air-caledonie.png" alt="Air Calédonie - Nos racines ont des ailes" />
					</a>
					<div class="o-branding__baseline">
						<span class="o-branding__part1">Nos racines </span><br />
						<span class="o-branding__part2"> ont des ailes</span>
					</div>
					<jdoc:include type="modules" name="band" style="none" />
				</div>
			</div>
		</header>

		<main class="o-main" role="main">
			<jdoc:include type="modules" name="content-top" style="none" />
			<?php if ($this->countModules('content-left') && $this->countModules('content-right')) : ?>
				<div class="container">
					<div class="c-banner">
						<div class="row no-gutters">
							<div class="col-lg">
								<jdoc:include type="modules" name="content-left" style="none" />
							</div>
							<div class="col-lg u-grow">
								<jdoc:include type="modules" name="content-right" style="none" />
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="container">
				<jdoc:include type="message" />
			</div>
			<div class="container">
				<jdoc:include type="component" />
			</div>
			<?php if ($this->countModules('content')) : ?>
				<div class="container">
					<jdoc:include type="modules" name="content" style="none" />
				</div>
			<?php endif; ?>
			<?php if ($this->countModules('aside-left')) : ?>
				<aside class="o-aside o-aside--left" role="complementary">
					<jdoc:include type="modules" name="aside-left" style="none" />
				</aside>
			<?php endif; ?>
			<?php if ($this->countModules('aside-right')) : ?>
				<aside class="o-aside o-aside--right" role="complementary">
					<jdoc:include type="modules" name="aside-right" style="none" />
				</aside>
			<?php endif; ?>
			<?php if ($this->countModules('content-bottom')) : ?>
				<footer class="o-main__footer">
					<jdoc:include type="modules" name="content-bottom" style="none" />
				</footer>
			<?php endif; ?>
		</main>

		<?php if ($this->countModules('footer')) : ?>
			<footer class="o-footer" role="contentinfo">
				<div class="container">
					<jdoc:include type="modules" name="footer" style="none" />
				</div>
			</footer>
		<?php endif; ?>
	</div>
	<jdoc:include type="modules" name="modal" style="none" />
	<jdoc:include type="modules" name="debug" style="none" />
	<script src="<?php echo $urlGA; ?>"></script>
</body>
</html>
