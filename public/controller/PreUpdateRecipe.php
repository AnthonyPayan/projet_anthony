<?php
require("../../libraries/services/functions.php");
session_start();

if ($_GET) {
    $recipe_id = $_GET['id'];
    $user_id = $_SESSION['id'];
    $recipe = selectOneBy($pdo, 'recipes', 'id', $recipe_id);
    $categories = selectAll($pdo, 'categories');
}

$categoriesArray = [];

foreach ($categories as $category) {
    if ($category['id'] == $recipe['category_id']) {
        $categoriesArray[$number] = [
            "category_id" => $category['id'],
            "category_name" => $category['name'],
            "attribute" => "selected"
        ];
        $number++;
    } elseif ($category['id'] == ATTENTE) {
        continue;
    } else {
        $categoriesArray[$number] = [
            "category_id" => $category['id'],
            "category_name" => $category['name'],
            "attribute" => "null"
        ];
        $number++;
    }
}

if (!empty($recipe['image'])) {
    $srcImg = '/public/src/img/' . $recipe['image'] . '';
    $altImg = $recipe['title'];
} else {
    $srcImg = "https://via.placeholder.com/350x350";
    $altImg = "Cette recette ne comporte pas d'image ceci est une image de remplacement";
}


$template = "../templates/update_recipe.php";
include("../../profil_layout.php");
