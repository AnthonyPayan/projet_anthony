<?php
require("../../libraries/services/functions.php");
// session_start();

if ($_GET['recipe_id'] == FALSE || !isset($_GET)) {
    header("location: ../../public/templates/error.php?error=2");
} else {
    $recipe_id = $_GET['recipe_id'];
    $recipes = allDatas($pdo, $recipe_id);
    $count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
    $ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id);
    $date_recipe = showDate($recipes['date_recipe']);
    $comments = showCommentsUsers($pdo, $recipe_id);
}

if (isset($_SESSION['user'])) {
    $classDisplay = "btn";
} else {
    $classDisplay = "displaynone";
}


$imgSrcAlt = getImg($recipes['image'], $recipes['title']);

$template = "../templates/show_comments.php";
include("../../layout.php");
