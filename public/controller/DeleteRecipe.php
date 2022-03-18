<?php
session_start();
require('../../libraries/services/functions.php');
$pdo = getPdo();

if (!empty($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];
    $category_id = $_GET['category_id'];
    $user_id = $_SESSION['id'];


    $sql = "SELECT id FROM recipes WHERE user_id = $user_id AND category_id = $category_id";
    $query = $pdo->prepare($sql);
    $query->execute();
    $recipe = $query->fetchAll();

    deleteById($pdo, 'comments', 'recipe_id', $recipe_id);
    deleteById($pdo, 'recipes', 'id', $recipe_id);

    header("location: ../templates/show_my_recipes.php?category_id=$category_id");
}
