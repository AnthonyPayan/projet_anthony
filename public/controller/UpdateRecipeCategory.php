<?php
require('../../libraries/services/functions.php');
$pdo = getPdo();

if (!empty($_POST['recipe_id'])) {

    $recipe_id = $_POST['recipe_id'];
    $user_id = $_POST['user_id'];
    $category_id = $_POST['category_id'];
    $attente = ATTENTE;


    $sql = "UPDATE recipes SET category_id = ? WHERE id = $recipe_id";
    $query = $pdo->prepare($sql);
    $query->execute([$category_id]);


    $sql = "SELECT id FROM recipes WHERE user_id = $user_id AND category_id = $attente";
    $query = $pdo->prepare($sql);
    $query->execute();
    $recipe_info = $query->fetchAll();

    if (!empty($recipe_info)) {
        header("location: ../templates/update_categories.php");
    } else {
        header("location: /index.php");
    }
}
