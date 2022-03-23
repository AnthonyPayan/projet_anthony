<?php
require('../../admin_layout.php');
$pdo = getPdo();


if (isset($_GET['user_id']) && $_SESSION['role'] == ADMIN) {
    $id = $_GET['user_id'];
    $data_id = selectOneByFetch($pdo, 'id', 'users', 'id', $id);

    if ($data_id == false) {
        echo "Cette utilisateur n'existe pas";
    } else {

        deleteById($pdo, 'comments', 'user_id', $id);


        $recipes = selectOneByAll($pdo, 'id', 'recipes', 'user_id', $id);


        foreach ($recipes as $recipe) {
            deleteById($pdo, 'comments', 'recipe_id', $recipe['id']);
        }


        deleteById($pdo, 'recipes', 'user_id', $id);


        deleteById($pdo, 'users', 'id', $id);

        header("location: ../templates/users.php");
    }
}
