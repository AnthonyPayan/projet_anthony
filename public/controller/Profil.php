<?php
require('../../libraries/services/functions.php');
session_start();

if (!isset($_SESSION['role'])) {
    header("location: /public/controller/Error.php?error=3");
} elseif (!isset($_GET)) {
    header("location: /public/controller/Error.php?error=2");
} elseif (!isset($_GET['user_id'])) {
    header("location: /public/controller/Error.php?error=2");
} elseif ($_GET['user_id'] !== $_SESSION['id']) {
    header("location: /public/controller/Error.php?error=4");
    exit();
}

$user_id = $_SESSION['id'];
$user = selectOneBy($pdo, 'users', 'id', $_GET['user_id']);
$timestamp = strtotime($user['registration_at']);
$sum = countAsWhere($pdo, 'id', 'recipe_count', 'recipes', 'user_id', $user['id']);

//Logique pour affichage des notifications
if ($_SESSION) {
    $attente = ATTENTE;
    $recipe_info = countWaWfetch($pdo, 'id', 'recipes_wait', 'recipes', 'user_id', 'category_id', $user_id, $attente);

    if (!empty($recipe_info['recipes_wait'])) {
        $ifNotification = '<span class="text-white span-badge">' . $recipe_info['recipes_wait'] . '</span>';
    } else {
        $ifNotification = NULL;
    }
}

//Traitement affichage modification catégories si une recette dans la catégorie "ATTENTE"
if (!empty($recipe_info['recipes_wait'])) {
    $btnDisplay = "btn";
    $containerDisplay = "container-info";
    $infoDisplay = NULL;
} else {
    $btnDisplay = "displaynone";
    $containerDisplay = "displaynone";
    $infoDisplay = "displaynone";
}


$template = "../../public/templates/profil.php";
include("../../profil_layout.php");
