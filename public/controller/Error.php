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
    $errorLink = "PreLogin.php";
    $errorLinkMessage = "Connexion";
} elseif ($_GET['error'] == 4) {
    $errorMessage = "Désolé ce profil ne vous est pas accessible";
} elseif ($_GET['error'] == 5) {
    $errorMessage = "Désolé cette recette ne vous est pas accessible";
} elseif ($_GET['error'] == 6) {
    $errorMessage = "Cet utilisateur n'existe pas";
}

//Login

elseif ($_GET['error'] == 7) { //MDP invalide
    $errorMessage = "Mot de passe invalide";
    $errorLink = "PreLogin.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 8) { //Pseudo n'éxiste pas
    $errorMessage = "Ce pseudonyme n'éxiste pas";
    $errorLink = "PreLogin.php";
    $errorLinkMessage = "Réessayer";
}

//ChangePassword

elseif ($_GET['error'] == 9) { //Tout les chaps ne sont pas remplis
    $errorMessage = "Tout les champs n'ont pas été remplis";
    $errorLink = "PreChangePassword.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 10) { //MDP ne correspondent pas
    $errorMessage = "Les mot de passe ne correspondent pas";
    $errorLink = "PreChangePassword.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 11) { //Ancient MDP non valide
    $errorMessage = "L\'ancien mot de passe n\'est pas valide.";
    $errorLink = "PreChangePassword.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 19) { //Champ non remplis
    $errorMessage = "Tout les champs n'ont pas été remplis";
    $errorLink = "Prelogin.php";
    $errorLinkMessage = "Réessayer";
}

//Registration

elseif ($_GET['error'] == 12) { //Champ pseudonyme non reçu
    $errorMessage = "Champ pseudonyme recquis";
    $errorLink = "PreRegistration.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 13) { //Pseudonyme mauvais caractère
    $errorMessage = "Le pseudo ne peut contenir que les caractères suivant : a-z A-Z 0-9 et _";
    $errorLink = "PreRegistration.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 14) { //Pseudo déjà utilisé
    $errorMessage = "Ce pseudo est déjà pris.";
    $errorLink = "PreRegistration.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 15) { //Champ MDP vide
    $errorMessage = "Champ mot de passe recqui.";
    $errorLink = "PreRegistration.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 16) { //MDP de confiarmation ne correspond pas
    $errorMessage = "Le mot de passe de confirmation ne correspond pas.";
    $errorLink = "PreRegistration.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 17) { //une erreur est survenu
    $errorMessage = "une erreur est survenu";
    $errorLink = "PreRegistration.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 18) { //une erreur est survenu
    $errorMessage = "Champ mot de passe de confirmation recquis";
    $errorLink = "PreRegistration.php";
    $errorLinkMessage = "Réessayer";
} elseif ($_GET['error'] == 20) { //une erreur est survenu
    $errorMessage = "Désolé une erreur est survenu";
} elseif ($_GET['error'] == 21) { //une erreur est survenu
    $errorMessage = "Vous souhaitez supprimer une recette qui ne vous appartient pas";
} elseif ($_GET['error'] == 22) {
    $errorMessage = "Désolé vous n'avez pas les droits pour accéder à cette page";
}

$template = "../templates/error.php";
include("../../layout.php");
