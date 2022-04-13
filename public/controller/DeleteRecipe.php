<?php
session_start();
require('../../libraries/services/functions.php');


if (!empty($_GET['recipe_id'])) {

    $check_user_id = allDatas($pdo, $_GET['recipe_id']);

    //Verification : Si l'utilisateur souhaitant supprimer la recette est le même que l'utilisateur postant la recette
    if ($check_user_id['user_id'] === $_SESSION['id']) {

        $recipe_id = $_GET['recipe_id'];
        $category_id = $_GET['category_id'];
        $user_id = $_SESSION['id'];

        $sql = "SELECT id FROM recipes WHERE user_id = $user_id AND category_id = $category_id";
        $query = $pdo->prepare($sql);
        $query->execute();
        $recipe = $query->fetchAll();

        try {
            deleteById($pdo, 'comments', 'recipe_id', $recipe_id);
            deleteById($pdo, 'recipes', 'id', $recipe_id);
        } catch (Exception $e) {
            echo "Exception reçue : Une erreur inattendu est survenu";
            exit();
        }
        header("location: ../controller/ShowMyRecipes.php?category_id=$category_id");
    } else {
        header("location: Error.php?error=21");
    }
} else {
    header("location: Error.php?error=1");
}
