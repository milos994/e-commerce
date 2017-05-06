<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Miloš Nešovanović / milos.nesovanovic.13@singimail.rs">
	<title><?php echo @$DATA['seo_title']; ?></title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo Configuration::BASE_URL ?>assets/css/main.css">
	<link rel="shortcut icon" type="image/png" href="<?php echo Configuration::BASE_URL ?>assets/img/favicon.png"/>
</head>
<body>

<header>
	<div class="container">
		<nav class="navbar navbar-toggleable-md navbar-default navbar-light navbar-fixed-top">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-menu"  aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<a class="navbar-brand" href="<?php echo Configuration::BASE_URL ?>">
				<img src="<?php echo Configuration::BASE_URL ?>assets/img/logo02.png" alt="">
			</a>

			<div class="collapse navbar-collapse " id="main-menu">
				<ul class="nav navbar-nav ml-auto">
					<li><a class="nav-item nav-link" href="<?php echo Configuration::BASE_URL ?>proizvodi">Proizvodi</a></li>
					<li><a class="nav-item nav-link" href="<?php echo Configuration::BASE_URL ?>/onama">O nama</a></li>
					<li><a class="nav-item nav-link" href="<?php echo Configuration::BASE_URL ?>/kontakt">Kontakt</a></li>
				</ul>
			</div>
		</nav>
	</div>
</header>