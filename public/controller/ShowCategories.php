<?php
require('../../libraries/services/functions.php');


$categories = selectAll($pdo, 'categories');
$recipes = selectAllByFetchAll($pdo, 'category_id', 'recipes');
$nb_category = count($categories);
$affichageLiens = NULL;

// Logique d'affichage du titre
if ($nb_category > 1 && !empty($recipes)) {
   $categorie_title = "Les catégories contenant des recettes";
} elseif ($nb_category == 1 && !empty($recipes)) {
   $categorie_title = "La catégorie contenant des recette";
} elseif (empty($recipes) || $nb_category == 0) {
   $categorie_title = "Il n'y à pas de recette à afficher pour l'instant";
   $affichageLiens = TRUE;
}

$recipeNumber = [];

// Logique d'affichage des catégories contenant des recettes
foreach ($categories as $category) {

   $recipeNumber[$category['id']] = ['number' => 0, 'name' => $category['name']];

   foreach ($recipes as $recipe) {
      if ($recipe['category_id'] == $category['id']) {

         $recipeNumber[$category['id']]['number'] += 1;
      }
   }
   if ($recipeNumber[$category['id']]['number'] == 0) {
      unset($recipeNumber[$category['id']]);
   }
}

//Logique d'affichage de la section
if (!empty($recipes)) {
   $classCategory = "class=\"categories_choice\"";
} else {
   $classCategory = NULL;
}

$template = ("../templates/categories.php");
include('../../layout.php');
