<?php
require("../../libraries/services/functions.php");


if ($_GET) {
    $category_id = $_GET['category_id'];
    $recipes = selectAllBy($pdo, 'recipes', 'category_id', $category_id);
    $category = selectOneBy($pdo, 'categories', 'id', $category_id);
}
$i = 0;
foreach ($recipes as $recipe) {

    $recipe_id = $recipe['id'];
    $recipe_user_id = $recipe['user_id'];
    $user = selectOneByFetch($pdo, 'nickname', 'users', 'id', $recipe_user_id);
    $autor = $user['nickname'];
    $recipe_date = showDate($recipe['date_recipe']);

    //Moyenne des notes de recette
    $count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);

    //Nombre de commentaire
    $ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id);

    //Traitement SRC de l'image et ALT
    $imgSrcAlt = getImg($recipe['image'], $recipe['title']);

    //Infos pour l'affichage
    $datas[$i] = [
        "recipe_id" => $recipe['id'],
        "recipe_title" => $recipe['title'],
        "author" => $autor,
        "date" => $recipe_date,
        "category" => $category['name'],
        "rank" => $count['average'],
        "ranked_count" => $ranked_count['ranked_count'],
        "srcImg" => $imgSrcAlt['src'],
        "altImg" => $imgSrcAlt['alt']
    ];
    $i++;
}

$template = "../templates/show_recipes.php";
include("../../layout.php");
