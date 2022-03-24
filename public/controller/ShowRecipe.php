<?php

if ($_GET['recipe_id']) {

    $recipe_id = $_GET['recipe_id'];
} else {
    header("location: error.php?error=2");
}

$recipe = selectOneBy($pdo, 'recipes', 'id', $recipe_id);

if ($recipe == false) {
    header("location: error.php?error=1");
}

$recipe_category = $recipe['category_id'];
$category = selectOneBy($pdo, 'categories', 'id', $recipe_category);
$user = selectOneBy($pdo, 'users', 'id', $recipe['user_id']);
$date_recipe = showDate($recipe['date_recipe']);
$count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
$ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id);

//Traitement SRC de l'image et ALT
if (!empty($recipe['image'])) {
   $srcImg = '/public/src/img/'.$recipe['image'].'';
   $altImg = $recipe['title'];

}else {
   $srcImg = "https://via.placeholder.com/350x150";
   $altImg = "Cette recette ne comporte pas d'image ceci est une image de remplacement";
}

?>
