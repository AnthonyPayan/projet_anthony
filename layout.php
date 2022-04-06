<?php
require('public/controller/Layout.php');
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/public/css/base/normalize.css" rel="stylesheet">
	<link href="/public/css/style.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="/public/src/logo_bg/marmite_blue copie.png" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<title>Recette</title>
</head>

<body>
	<header>
		<nav>
			<a title="Retour accueil du site" href="/index.php"><i class="fas fa-home"></i><span>Accueil</span></a>
			<!--TODO: Condition dans controller -->
			<?php if ($_SESSION) : ?>
				<a title="Ajout d'une recette" href="/public/controller/NewRecipe.php">
					<i class="fas fa-plus"></i><span>Recette</span>
				</a>
			<?php endif; ?>

			<a title="Liste des recettes" href="/public/controller/ShowCategories.php">
				<i class="fas fa-book"></i><span>Recettes</span>
			</a>
			<!--TODO: Condition dans controller -->
			<?php if ($_SESSION) : ?>

				<a href="/public/controller/Profil.php?user_id=<?= $session_id; ?>">

					<?php if ($_SESSION) : ?>

						<?php if (!empty($recipe_info['recipes_wait'])) : ?>
							<i class="fas fa-user"></i><span>Mon profil</span><span class="span-badge"><?= $recipe_info['recipes_wait']; ?></span>
						<?php else : ?>
							<i class="fas fa-user"></i><span>Mon profil</span>
						<?php endif; ?>
					<?php endif; ?>

				</a>
				<a href="/public/controller/Logout.php">
					<i class="fas fa-sign-out-alt"></i>
					<span>Déconnexion</span>
				</a>
				<!--TODO: Condition dans controller -->
			<?php else : ?>
				<a href="/public/templates/login.php">
					<i class="fas fa-sign-out-alt"></i>
					<span>Connexion</span>
				</a>

			<?php endif; ?>
		</nav>

	</header>
	<main>
		<?php include($template); ?>