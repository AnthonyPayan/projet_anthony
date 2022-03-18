<?php
require('../../libraries/services/functions.php');
$pdo = getPdo();


if (!empty($_GET['user_id']) && !empty($_GET['category_id']) && !empty($_GET['page_name'])) {
    $user_id = $_GET['user_id'];
    $category_id = $_GET['category_id'];
    $page_name = $_GET['page_name'];
}
if (empty($_GET['recipe_id'])) {
    header("location: ../../public/templates/error.php?error=2");
    exit();
} else {
    $recipe_id = $_GET['recipe_id'];
    deleteById($pdo, 'comments', 'recipe_id', $recipe_id);
    deleteById($pdo, 'recipes', 'id', $recipe_id);
}
if ($_GET['recipe_id'] && $page_name === 'show_recipes') {
    header('location: /private/templates/show_recipes.php?user_id=' . $user_id . '&category_id=' . $category_id . '');
    exit();
} elseif ($_GET['recipe_id'] && $page_name === 'recipes') {
    header('location: /private/templates/recipes.php?user_id=' . $user_id . '');
    exit();
} elseif ($_GET['recipe_id'] && $page_name === 'show_recipe') {
    header("location: /private/templates/show_recipes.php?user_id=$user_id&category_id=$category_id");
    exit();
} else {
    header('location: /private/templates/recipes.php');
    exit();
}
