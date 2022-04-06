<?php
require('libraries/services/functions.php');
session_start();
adminCheck();
// $pdo = getPdo();
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://bootswatch.com/5/flatly/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/public/src/logo_bg/marmite_blue copie.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Admin - Recette</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/private/index.php">Administration</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/private/templates/recipes.php">Liste des recettes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/private/templates/users.php">Liste des utilisateurs</a>
                    </li>
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/private/templates/show_categories.php">Liste des catégories</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Options</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/index.php"><i class="fas fa-home"></i> <span>Accueil utilisateur</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/public/controller/Logout.php"><i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>