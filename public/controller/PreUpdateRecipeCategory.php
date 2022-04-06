<?php
require("../../libraries/services/functions.php");
session_start();

if ($_SESSION) {
    $user_id = $_SESSION['id'];
    $categories = selectAll($pdo, 'categories');
    $recipe_infos = selectByWaW($pdo, 'recipes', 'user_id', 'category_id', $user_id, ATTENTE);
}

$template = "../templates/update_categories.php";
include("../../profil_layout.php");
