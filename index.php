<?php

//Traitement !
require('libraries/services/functions.php');
$pdo = getPdo();


//nombre de recette maximum par page.
$max_elements = 8;

//Définition page d'affichage.
if (empty($_GET['page'])) {
	$_GET['page'] = 1;
}

$recipes = selectPaginationJoin($pdo, 'recipes', $_GET['page'], $max_elements);
$nb_recipes = nbPages($pdo);
$pagination = ceil($nb_recipes['count_recipe'] / $max_elements);

if (!empty($recipes)) {
	$classNoRecipe = NULL;

	foreach ($recipes as $recipe) {
		$recipe_id = $recipe['id'];
		$category = selectOneByFetch($pdo, 'category_id', 'recipes', 'id', $recipe_id);
		$category_id = $category['category_id'];
		$recipe_description = substr($recipe['description'], 0, 55);
		$date = showDate($recipe['date_recipe']);
		$count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
		$ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id);

		if (!empty($recipe['image'])) {
			$srcImg = '/public/src/img/' . $recipe['image'] . '';
			$altImg = $recipe['title'];
		} else {
			$srcImg = "https://via.placeholder.com/350x350";
			$altImg = "Cette recette ne comporte pas d'image ceci est une image de remplacement";
		}

		$datas[$recipe['id']] = [
			"recipe_id" => $recipe_id,
			"category_id" => $category_id,
			"recipe_title" => substr($recipe['title'], 0, 20),
			"author" => $recipe['nickname'],
			"srcImg" => $srcImg,
			"altImg" => $altImg,
			"count_average" => $count['average'],
			"count_comments" => $ranked_count['ranked_count'],
			"avatar" => $avatar[$recipe['avatar']],
			"date" => $date
		];
	}
} else {
	$classNoRecipe = 'class="container-info"';
}

//Pagination
$paginationViews = [];

for ($i = 1; $i <= $pagination; $i++) {
	$paginationViews[$i] = ["pagination" => $i];
}

$template = "public/templates/home.php";
include('layout.php');
// include('layout_end.php');
