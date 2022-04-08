<?php
require("../../libraries/services/functions.php");
session_start();

$categories = selectAll($pdo, 'categories');
$recipes = selectOneByAll($pdo, 'category_id', 'recipes', 'user_id', $_SESSION['id']);

$displayLink = "displaynone";

if (!isset($_SESSION['id'])) {
    header("location: error.php?error=3");
} else {
    $session_id = $_SESSION['id'];
}

if (empty($categories) || empty($recipes)) {
    $my_category_title = "Vous n'avez pas de recette";
    $classCategory = NULL;
    $displayLink = "";
} else {
    $my_category_title = "Mes recettes";
    $classCategory = 'class="categories_choice"';
}

$recipeNumber = [];

// Logique d'affichage des catégories contenant des recettes
foreach ($categories as $category) {

    $recipeNumber[$category['id']] = ['number' => 0, 'name' => $category['name']];

    foreach ($recipes as $recipe) {
        if ($recipe['category_id'] == $category['id']) {

            $recipeNumber[$category['id']]['number'] += 1;
        }
    }
    if ($recipeNumber[$category['id']]['number'] == 0) {
        unset($recipeNumber[$category['id']]);
    }
}

$template = "../templates/show_my_categories.php";
include("../../profil_layout.php");
