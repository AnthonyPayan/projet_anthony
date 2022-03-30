<?php

if ($_GET) {
    $category_id = $_GET['category_id'];
    $recipes = selectAllBy($pdo, 'recipes', 'category_id', $category_id);
    $category = selectOneBy($pdo, 'categories', 'id', $category_id);
}

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
    if (!empty($recipe['image'])) {
        $srcImg = '/public/src/img/' . $recipe['image'] . '';
        $altImg = $recipe['title'];
    } else {
        $srcImg = "https://via.placeholder.com/350x350";
        $altImg = "Cette recette ne comporte pas d'image ceci est une image de remplacement";
    }

    //Infos pour l'affichage
    $datas[$recipe['id']] = [
        "recipe_title" => $recipe['title'],
        "author" => $autor,
        "date" => $recipe_date,
        "category" => $category['name'],
        "rank" => $count['average'],
        "ranked_count" => $ranked_count['ranked_count'],
        "srcImg" => $srcImg,
        "altImg" => $altImg
    ];
}
