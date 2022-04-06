<?php
require('../../libraries/services/functions.php');


if (!empty($_POST)) {
    $recipe_id = $_POST['recipe_id'];
    $title = htmlentities($_POST['title']);
    $description = htmlentities($_POST['description']);
    $user_id = $_POST['user_id'];
    $category_id = $_POST['category'];

    if (empty($_FILES) || $_FILES['image']['name'] == '') {

        $sql = "UPDATE recipes SET title = ?, description = ?, user_id = ?, category_id = ? WHERE id = $recipe_id";
        $query = $pdo->prepare($sql);
        $query->execute([$title, $description, $user_id, $category_id]);
        header("location: ../../public/controller/ShowMyCategories.php");
        exit();
    }
    if (!empty($_FILES) && $_FILES['image']['name'] != '') {

        move_uploaded_file($_FILES["image"]["tmp_name"], getcwd() . "/../src/img/" . $_FILES["image"]["name"]);
        $image = $_FILES['image']['name'];

        $sql = "UPDATE recipes SET title = ?, description = ?, image = ?, user_id = ?, category_id = ? WHERE id = $recipe_id";
        $query = $pdo->prepare($sql);
        $query->execute([$title, $description, $image, $user_id, $category_id]);
        header("location: ../../public/controller/ShowMyCategories.php");
        exit();
    }
}
