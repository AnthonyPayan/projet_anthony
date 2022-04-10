<?php
require("../../libraries/services/functions.php");

$errorLink = "/index.php";
$errorLinkMessage = "Accueil";

if (empty($_GET)) {
    $errorMessage = "Comment êtes-vous arrivez ici ?!";
} elseif ($_GET['error'] == 1) {
    $errorMessage = "Désolé la recette n'existe pas";
} elseif ($_GET['error'] == 2) {
    $errorMessage = "Déssolé pas d'id reçu";
} elseif ($_GET['error'] == 3) {
    $errorMessage = "Déssolé vous n'êtes pas connecté";
    $errorLink = "Login.php";
    $errorLinkMessage = "Connexion";
} elseif ($_GET['error'] == 4) {
    $errorMessage = "Désolé ce profil ne vous est pas accessible";
} elseif ($_GET['error'] == 5) {
    $errorMessage = "Désolé cette recette ne vous est pas accessible";
} elseif ($_GET['error'] == 6) {
    $errorMessage = "Désolé vous n'avez pas les droits pour accéder à cette page";
} elseif ($_GET['error'] == 6) {
    $errorMessage = "Cet utilisateur n'existe pas";
} elseif ($_GET['error'] == 7) { //erreur login.php
    $errorMessage = "Mot de passe invalide";
    $errorLink = "login.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 8) { //erreur login.php
    $errorMessage = "Ce pseudonyme n'éxiste pas";
    $errorLink = "login.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 9) { //erreur login.php
    $errorMessage = "Tout les champs n'ont pas été remplis";
    $errorLink = "login.php";
    $errorLinkMessage = "Réessayer";
}
$template = "../templates/error.php";
include("../../layout.php");
