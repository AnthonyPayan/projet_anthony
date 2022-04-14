<?php
require('../../libraries/services/functions.php');


if (!empty($_POST['recipe_id'])) {

    $recipe_id = htmlentities($_POST['recipe_id']);
    $user_id = htmlentities($_POST['user_id']);
    $category_id = htmlentities($_POST['category_id']);
    $attente = ATTENTE;


    $sql = "UPDATE recipes SET category_id = :category_id WHERE id = :recipe_id";
    $query = $pdo->prepare($sql);

    $query->bindValue("category_id", $category_id);
    $query->bindValue("recipe_id", $recipe_id);

    $query->execute();


    $sql = "SELECT id FROM recipes WHERE user_id = :user_id AND category_id = :category_id";
    $query = $pdo->prepare($sql);

    $query->bindValue("user_id", $user_id);
    $query->bindvalue("category_id", $attente);

    $query->execute();
    $recipe_info = $query->fetchAll();

    if (!empty($recipe_info)) {
        header("location: ../controller/PreUpdateRecipeCategory.php");
    } else {
        header("location: /index.php");
    }
}
