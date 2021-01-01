<?php
$page = 'dashboard';
$available = [
	'autre-document',
	'dashboard',
	'formule',
	'old-formule',
	'contacts',
	'telephone',
	'securite',
	'tracabilite',
	'account',
	'operations-venir',
	'detail-compte',
	'detail-pret',
	'detail-depot',
	'detail-contrat',
	'encours-cb',
	'profil',
	'messagerie',
	'new-message',
	'double-signature-list',
	'double-signature-signer-virement',
	'double-signature-signer-valid',
	'liste-beneficiaire',
	'liste-beneficiaire-creer',
	'liste-beneficiaire-creer-ajouter',
	'liste-beneficiaire-confirmation',
	'liste-beneficiaire-validation',
	'liste-beneficiaire-detail',
	'virement',
	'new-virement',
	'virement-succes',
	'virement-permanent-signer',
	'virement-permanent-signer-pass',
	'virement-signer',
	'virement-signer-pass',
	'virement-multiple',
	'virement-multiple-signer',
	'virement-inter',
	'virements-permanents',
	'virement-en-cours-dupliquer',
	'virement-domtom',
	'virement-passes',
	'virement-en-cours',
	'virement-en-cours-vide',
	'new-virement',
	'docs',
	'beneficiaire',
	'new-beneficiaire',
	'beneficiaire-detail',
	'beneficiaire-nc',
	'new-beneficiaire-confirm',
	'new-beneficiaire-valid',
	'new-beneficiaire-refuse',
	'document',
	'gestion-virement',
	'recherche-avancee',
	'devise',
	'commande-chequier',
	'souscrire-releve',
	'souscrire-arobase',
	'paiement-facture',
	'paiement-facture-form',
	'releves-frais',
	'menu-virement',
	'gestion-transfert-fichier-a-signer',
	'gestion-transfert-fichier-en-cours',
	'gestion-transfert-fichier-remise',
	'transfert-fichier',
	'detail-message',
];

$whitelist = [
	'127.0.0.1',
	'::1',
];

if (isset($_GET['page']) && in_array($_GET['page'], $available)) {
	$page = $_GET['page'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no"/>
	<meta name="format-detection" content="telephone=no"/>
	<title>[TITLE]</title>
	<link rel="preload" as="font" href="medias/fonts/icons.woff2" type="font/woff2" crossorigin="crossorigin"/>
	<link rel="stylesheet" href="medias/style/select2.min.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="medias/style/datepicker.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="medias/style/quill.snow.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="medias/style/main.css" type="text/css" media="screen"/>
	<link rel="icon" href="medias/image/favicon.ico"/>
	<link rel="apple-touch-icon" href="medias/image/apple-touch-icon.png"/>
	<script type="text/javascript" src="medias/script/jquery.min.js"></script>
	<script type="text/javascript" src="medias/script/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="medias/script/select2.min.js"></script>
	<script type="text/javascript" src="medias/script/Chart.min.js"></script>
	<script type="text/javascript" src="medias/script/datepicker.js"></script>
	<script type="text/javascript" src="medias/script/datepicker-fr.js"></script>
	<script type="text/javascript" src="medias/script/jquery.ui.monthpicker.js"></script>
	<script type="text/javascript" src="medias/script/jquery.jeditable.min.js"></script>
	<script type="text/javascript" src="medias/script/quill.min.js"></script>
	<?php if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)): ?>
	<script type="text/javascript" src="medias/script/main.js"></script>
	<?php else: ?>
	<script type="text/javascript" src="medias/script/main.backup.js"></script>
	<?php endif; ?>
</head>
<body class="page-<?php echo $page; ?>">
	<div class="l-page">
		<!-- Page header -->
		<header class="l-header">
			<!-- Page logo -->
			<div class="l-header__logo">
				<a href="./" class="l-header__logo-link">
					<img class="l-header__logo-image" src="medias/image/logo.svg" alt="BCI"/>
				</a>
			</div>
			<div class="l-header__nav">
				<!-- Welcome message -->
				<div class="l-header__intro">
					<h1 class="l-header__intro-name">Bienvenue Thierry</h1>
					<div class="l-header__intro-date">Dernière connexion le 15/03/2018</div>
				</div>

				<!-- User category selector -->
				<nav class="l-header__category">
					<ul class="l-header__category-list">
						<li class="l-header__category-item is-active">
							<a class="l-header__category-link" href="#">Personnel</a>
						</li>
						<li class="l-header__category-item">
							<a class="l-header__category-link" href="#">Professionnel</a>
						</li>
					</ul>
				</nav>

				<!-- User menu -->
				<nav class="l-header__menu">
					<ul class="l-header__menu-list">
						<li class="l-header__menu-item">
							<a href="./?page=messagerie" class="l-header__menu-link">
								<i class="l-header__menu-ico ico-messenger"></i>
								<span class="l-header__menu-text">Mes messages</span>
								<span class="badge badge-danger">1</span>
							</a>
						</li>
						<li class="l-header__menu-item is-active has-boxing">
							<a href="./?page=profil" class="l-header__menu-link">
								<i class="l-header__menu-ico ico-login"></i>
								<span class="l-header__menu-text">Mon profil</span>
								<i class="l-header__menu-ico--right ico-arrow-down"></i>
							</a>
							<div class="d-none d-lg-block">
								<div class="o-boxing--profil">
									<div class="o-boxing__head--light pt-4">
										<div class="row pb-1">
											<div class="col-5">
												<div class="avatar">T</div>
											</div>
											<div class="col-7 pl-0 align-self-center">
												<h6 class="u-color-blue-light u-font-15">Thierry Charras</h6>
												<div class="u-color-grey u-font-15 u-font-normal">t.charras@gmail.com</div>
											</div>
										</div>
									</div>
									<div class="o-boxing__body">
										<nav>
											<ul class="o-boxing__menu">
												<li class="o-boxing__menu-item is-active">
													<a href="#">Changer mon mot de passe</a>
												</li>
												<li class="o-boxing__menu-item">
													<a href="#">Mon téléphone mobile/fixe</a>
												</li>
												<li class="o-boxing__menu-item">
													<a href="#">Mon adresse e-mail</a>
												</li>
												<li class="o-boxing__menu-item">
													<a href="#">Mon adresse de correspondance</a>
												</li>
												<li class="o-boxing__menu-item">
													<a href="#">Traçabilité des opérations et contrats</a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</li>
						<li class="l-header__menu-item">
							<a href="./logout.php" class="l-header__menu-link">
								<i class="l-header__menu-ico ico-logout"></i>
								<span class="l-header__menu-text">Se déconnecter</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</header>

		<div class="l-content">
			<!-- Page main menu -->
			<aside class="l-menu js-footer">
				<nav class="l-menu__nav">
					<ul class="l-menu__list">
						<li class="l-menu__item">
							<a href="./" class="l-menu__link">
								<i class="l-menu__ico ico-dashboard"></i>
								<span class="l-menu__text">Tableau de bord</span>
							</a>
						</li>
						<li class="l-menu__item is-active">
							<a href="./?page=account" class="l-menu__link">
								<i class="l-menu__ico ico-account"></i>
								<span class="l-menu__text">Comptes<span class="d-none d-lg-inline"> & contrats</span></span>
							</a>
						</li>
						<li class="l-menu__item">
							<a href="./?page=new-virement" class="l-menu__link">
								<i class="l-menu__ico ico-operations"></i>
								<span class="l-menu__text">Virements</span>
								<span class="badge badge-danger">3</span>
							</a>
						</li>
						<li class="l-menu__item">
							<a href="./?page=devise" class="l-menu__link">
								<i class="l-menu__ico ico-services"></i>
								<span class="l-menu__text">Services</span>
							</a>
						</li>
						<li class="l-menu__item">
							<a href="./?page=document" class="l-menu__link">
								<i class="l-menu__ico ico-document"></i>
								<span class="l-menu__text">Documents</span>
							</a>
						</li>
					</ul>
				</nav>
			</aside>

			<!-- Page content -->
			<main class="l-main js-main">
				<!--div class="alert alert-warning alert--maintenance js-alert-maintenance">
					<i class="alert-ico ico-thunder"></i>
					lorem ipsum dolor sit amet, lorem ipsum dolor sit amet, lorem ipsum dolor sit amet
				</div-->
				<div class="l-main__inner js-main-inner">
					<?php if (file_exists("pages/$page.html")) {
						include "pages/$page.html";
					} ?>
				</div>
			</main>
		</div>
	</div>
	</div>
</body>
</html>
