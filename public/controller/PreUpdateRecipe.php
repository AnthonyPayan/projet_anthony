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
$number = 0;
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

//Recupération de la source et du Alt de l'image
$imgSrcAlt = getImg($recipe['image'], $recipe['title']);



$template = "../templates/update_recipe.php";
include("../../profil_layout.php");
