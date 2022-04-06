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

if (!empty($recipes['image'])) {
    $srcImg = '/public/src/img/' . $recipes['image'] . '';
    $altImg = $recipes['title'];
} else {
    $srcImg = "https://via.placeholder.com/350x350";
    $altImg = "Cette recette ne comporte pas d'image ceci est une image de remplacement";
}

$template = "../templates/show_comments.php";
include("../../layout.php");
