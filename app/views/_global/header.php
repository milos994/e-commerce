<!DOCTYPE html>
<?php
    if(!isset($_SESSION)) { 
        session_start(); 
    } 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Miloš Nešovanović / milos.nesovanovic.13@singimail.rs">
    <title>Prodavnica</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo Configuration::BASE_URL ?>assets/css/main.css">
    <link rel="shortcut icon" type="image/png" href="<?php echo Configuration::BASE_URL ?>assets/img/favicon.png"/>
</head>
<body>

<header>
    <div class="login">
        <div class="container text-right">
            <?php
                if(isset($_SESSION['user_id']) && is_int($_SESSION['user_id'])) {
                    echo 'Ulogovani ste kao ' . $_SESSION['username'] . '. ';
                    echo '<a href="' .Configuration::BASE_URL . 'logout" class="btn btn-sm btn-success my-1">Izloguj se</a>';
                } else {
                    echo '<a href="' .Configuration::BASE_URL . 'login" class="btn btn-sm btn-success my-1">Uloguj se</a>';
                    echo '<a href="' .Configuration::BASE_URL . 'registracija" class="btn btn-sm btn-info my-1 ml-3">Registruj se</a>';
                }
                
                 
            ?>
            
        </div>
    </div>
    <div class="main-header">
	<div class="container">
            <nav class="navbar navbar-toggleable-md navbar-default navbar-light navbar-fixed-top px-0 py-2">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-menu"  aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="<?php echo Configuration::BASE_URL ?>">
                    <img src="<?php echo Configuration::BASE_URL ?>assets/img/logo02.png" alt="">
                </a>

                <div class="collapse navbar-collapse " id="main-menu">
                    <ul class="nav navbar-nav ml-auto">
                        <li><a class="nav-item nav-link" href="<?php echo Configuration::BASE_URL ?>proizvodi">Proizvodi</a></li>
                        <li><a class="nav-item nav-link" href="onama.html">O nama</a></li>
                        <li><a class="nav-item nav-link" href="<?php echo Configuration::BASE_URL ?>kontakt">Kontakt</a></li>
                    </ul>
                </div>
            </nav>
	</div>
    </div>
</header>