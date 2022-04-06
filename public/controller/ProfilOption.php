<?php
require("../../libraries/services/functions.php");
session_start();

if (!isset($_SESSION['role'])) {
    header("location: error.php?error=3");
} elseif (!isset($_GET)) {
    header("location: error.php?error=2");
} elseif (!isset($_GET['user_id'])) {
    header("location: error.php?error=2");
} elseif ($_GET['user_id'] !== $_SESSION['id']) {
    header("location: error.php?error=4");
}

$user = selectOneBy($pdo, 'users', 'id', $_GET['user_id']);
$timestamp = strtotime($user['registration_at']);

$classDisplay = NULL;

//Ajout la class displaynone pour éviter que l'admin ne supprime son compte.
if ($_SESSION['role'] == ADMIN) {
    $classDisplay = "displaynone";
}

$template = "../templates/profil_option.php";
include("../../profil_layout.php");
