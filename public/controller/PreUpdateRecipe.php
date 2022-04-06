<?php
require("../../libraries/services/functions.php");
session_start();

if ($_GET) {
    $recipe_id = $_GET['id'];
    $user_id = $_SESSION['id'];
    $recipe = selectOneBy($pdo, 'recipes', 'id', $recipe_id);
    $categories = selectAll($pdo, 'categories');
}

$template = "../templates/update_recipe.php";
include("../../profil_layout.php");
