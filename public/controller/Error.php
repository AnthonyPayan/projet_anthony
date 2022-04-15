<?php
require("../../libraries/services/functions.php");

$errors = [
    "1" => [
        "errorMessage" => "cette recette n'existe pas",
        "errorLink" => "/index.php",
        "errorLinkMessage" => "Accueil"
    ],
    "2" => [
        "errorMessage" => "aucun d'id reçu",
        "errorLink" => "/index.php",
        "errorLinkMessage" => "Accueil"
    ],
    "3" => [
        "errorMessage" => "vous n'êtes pas connecté",
        "errorLink" => "PreLogin.php",
        "errorLinkMessage" => "connexion"
    ],
    "4" => [
        "errorMessage" => "ce profil ne vous est pas accessible",
        "errorLink" => "/index.php",
        "errorLinkMessage" => "accueil"
    ],
    "5" => [
        "errorMessage" => "cette recette ne vous est pas accessible",
        "errorLink" => "/index.php",
        "errorLinkMessage" => "accueil"
    ],
    "6" => [
        "errorMessage" => "cet utilisateur n'existe pas",
        "errorLink" => "/index.php",
        "errorLinkMessage" => "accueil"
    ],
    "7" => [
        "errorMessage" => "mot de passe invalide",
        "errorLink" => "PreLogin.php",
        "errorLinkMessage" => "réessayer"
    ],
    "8" => [
        "errorMessage" => "ce pseudonyme n'éxiste pas",
        "errorLink" => "PreLogin.php",
        "errorLinkMessage" => "réessayer"
    ],
    "9" => [
        "errorMessage" => "tout les champs n'ont pas été remplis",
        "errorLink" => "PreChangePassword.php",
        "errorLinkMessage" => "réessayer"
    ],
    "10" => [
        "errorMessage" => "les mot de passe ne correspondent pas",
        "errorLink" => "PreChangePassword.php",
        "errorLinkMessage" => "réessayer"
    ],
    "11" => [
        "errorMessage" => "ancien mot de passe non pas valide.",
        "errorLink" => "PreChangePassword.php",
        "errorLinkMessage" => "réessayer"
    ],
    "12" => [
        "errorMessage" => "champ pseudonyme recquis",
        "errorLink" => "PreRegistration.php",
        "errorLinkMessage" => "réessayer"
    ],
    "13" => [
        "errorMessage" => "le pseudonyme ne peut contenir que les caractères suivant : a-z A-Z 0-9 et _",
        "errorLink" => "PreRegistration.php",
        "errorLinkMessage" => "réessayer"
    ],
    "14" => [
        "errorMessage" => "pseudonyme est déjà utilisé",
        "errorLink" => "PreRegistration.php",
        "errorLinkMessage" => "réessayer"
    ],
    "15" => [
        "errorMessage" => "champ mot de passe non-rempli",
        "errorLink" => "PreRegistration.php",
        "errorLinkMessage" => "réessayer"
    ],
    "16" => [
        "errorMessage" => "mot de passe de confirmation ne correspond pas",
        "errorLink" => "PreRegistration.php",
        "errorLinkMessage" => "réessayer"
    ],
    "17" => [
        "errorMessage" => "une erreur est survenu",
        "errorLink" => "PreRegistration.php",
        "errorLinkMessage" => "réessayer"
    ],
    "18" => [
        "errorMessage" => "champ mot de passe de confirmation non rempli",
        "errorLink" => "PreRegistration.php",
        "errorLinkMessage" => "réessayer"
    ],
    "19" => [
        "errorMessage" => "tout les champs non pas été remplis",
        "errorLink" => "PreLogin.php",
        "errorLinkMessage" => "réessayer"
    ],
    "20" => [
        "errorMessage" => "une erreur est survenu",
        "errorLink" => "/index.php",
        "errorLinkMessage" => "accueil"
    ],
    "21" => [
        "errorMessage" => "cette recette ne vous appartient pas",
        "errorLink" => "/index.php",
        "errorLinkMessage" => "accueil"
    ],
    "22" => [
        "errorMessage" => "vous n'avez pas les droits pour accéder à cette page",
        "errorLink" => "/index.php",
        "errorLinkMessage" => "accueil"
    ],
    "23" => [
        "errorMessage" => "une erreur est survenu",
        "errorLink" => "/index.php",
        "errorLinkMessage" => "accueil"
    ]
];

if (array_key_exists($_GET['error'], $errors)) {
    $errorMessage = $errors[$_GET['error']]['errorMessage'];
    $errorLink = $errors[$_GET['error']]['errorLink'];
    $errorLinkMessage = $errors[$_GET['error']]['errorLinkMessage'];
} else {
    $errorLink = "/index.php";
    $errorMessage = "une erreur est survenu";
    $errorLinkMessage = "accueil";
}

$template = "../templates/error.php";
include("../../layout.php");
