<?php
require('public/controller/Layout.php');
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="/public/css/base/normalize.css" rel="stylesheet">
	<link href="/public/css/style.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="/public/src/logo_bg/favicon.ico" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<title>Recette</title>
</head>

<body>
	<header>
		<nav>
			<label class="switch ">
				<input type="checkbox" id="activateur_fonction">
				<span class="slider round"></span>
			</label>

			<a title="Retour accueil du site" href="/index.php">
				<i class="fas fa-home"></i>
				<span class="navspan">Accueil</span>
			</a>
			<a class="<?= $classDisplaySession; ?>" title="Ajout d'une recette" href="/public/controller/NewRecipe.php">
				<i class="fas fa-plus"></i>
				<span class="navspan">Recette</span>
			</a>
			<a title="Liste des recettes" href="/public/controller/ShowCategories.php">
				<i class="fas fa-book"></i><span class="navspan">Recettes</span>
			</a>
			<a class="<?= $classDisplaySession; ?>" href="/public/controller/Profil.php?user_id=<?= $session_id; ?>">
				<i class="fas fa-user"></i><span class="navspan">Mon profil</span><?= $notifWait; ?>
			</a>
			<a class="<?= $classDisplaySession; ?>" href="/public/controller/Logout.php">
				<i class="fas fa-sign-out-alt"></i>
				<span class="navspan">Déconnexion</span>
			</a>
			<a class="<?= $classDisplaySessionEmpty; ?>" href="/public/controller/PreLogin.php">
				<i class="fas fa-sign-out-alt"></i>
				<span class="navspan">Connexion</span>
			</a>
		</nav>
	</header>
	<main>
		<?php include($template); ?>
		<?php include("layout_end.php"); ?>