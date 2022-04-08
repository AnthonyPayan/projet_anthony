<?php
require("../../libraries/services/functions.php");
session_start();

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

//Traitement de l'affichage du bouton pour commenter.
if ($_SESSION['user'] === "admin" || $_SESSION['user'] === "user") {
    $classDisplay = "btn";
} else {
    $classDisplay = "displaynone";
}

$comments = [];

$datas = [];
$number = 0;
$infoDisplay = "displaynone";
$infoDisplay = "displaynone";
$linkDisplay = "displaynone";

if (!empty($comments)) {
    foreach ($comments as $comment) {
        $ranked = rankingStack($comment['ranked']);
        $datas[$number] = [
            "nickname" => $comment['nickname'],
            "comment" => $comment['comment'],
            "ranked" => rankingStack($comment['ranked'])
        ];
        $number++;
    }
} else {
    $infoDisplay = "container-info";
    $infoDisplay = "p-detail";
    $linkDisplay = "btn";
}

$imgSrcAlt = getImg($recipes['image'], $recipes['title']);

$template = "../templates/show_comments.php";
include("../../layout.php");
