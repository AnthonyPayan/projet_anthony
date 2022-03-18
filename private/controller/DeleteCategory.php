<?php
require('../../libraries/services/functions.php');
$pdo = getPdo();

if (!empty($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $category_info = selectOneBy($pdo, 'categories', 'id', $category_id);
    $count_category = countAsWhere($pdo, 'category_id', 'count_category', 'recipes', 'category_id', $category_id);


    if ($count_category['count_category'] == 0) {
        deleteById($pdo, 'categories', 'id', $category_id);
        header("location: ../templates/show_categories.php");
    }


    if ($count_category['count_category'] > 0) {
        $recipes = selectOneByAll($pdo, 'id', 'recipes', 'category_id', $category_id);
        foreach ($recipes as $recipe) {
            $recipe_id = $recipe['id'];

            $sql = "UPDATE recipes SET category_id = ? WHERE id = $recipe_id";
            $query = $pdo->prepare($sql);
            $query->execute([ATTENTE]);
        }
        deleteById($pdo, 'categories', 'id', $category_id);
        header("location: ../templates/show_categories.php");
    }
}
