<?php
require("../../libraries/services/functions.php");
session_start();

if ($_GET['recipe_id']) {
    $recipe_id = $_GET['recipe_id'];
} else {
    header("location: /public/controller/Error.php?error=2");
}

$recipe = selectOneBy($pdo, 'recipes', 'id', $recipe_id);

if ($recipe == false) {
    header("location: /public/controller/Error.php?error=1");
}

$recipe_category = $recipe['category_id'];
$category = selectOneBy($pdo, 'categories', 'id', $recipe_category);
$user = selectOneBy($pdo, 'users', 'id', $recipe['user_id']);
$date_recipe = showDate($recipe['date_recipe']);
$count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
$ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id);

//Traitement SRC de l'image et ALT
$imgSrcAlt = getImg($recipe['image'], $recipe['title']);

//Traitement de l'affichage du bouton pour commenter
if ($_SESSION['user'] === "admin" || $_SESSION['user'] === "user") {
    $classDisplay = "btn";
} else {
    $classDisplay = "displaynone";
}

$template = "../templates/show_recipe.php";
include("../../layout.php");
