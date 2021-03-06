<?php
require("../../libraries/services/functions.php");
session_start();


if (empty($_GET['recipe_id'])) {
   header("location: /public/controller/Error.php?error=2");
   exit();
}

$recipe_id = $_GET['recipe_id'];
$recipe = selectOneBy($pdo, 'recipes', 'id', $recipe_id);

if ($recipe['user_id'] !== $_SESSION['id']) {
   header("location: /public/controller/Error.php?error=5");
   exit();
}

$recipe_category = $recipe['category_id'];
$category = selectOneBy($pdo, 'categories', 'id', $recipe_category);
$user = selectOneBy($pdo, 'users', 'id', $recipe['user_id']);
$ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id);
$count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
$date_recipe = showDate($recipe['date_recipe']);


//définition src img & alt
$imgSrcAlt = getImg($recipe['image'], $recipe['title']);


$template = "../../public/templates/show_my_recipe.php";
include("../../profil_layout.php");
