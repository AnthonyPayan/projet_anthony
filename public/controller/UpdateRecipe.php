<?php
require('../../libraries/services/functions.php');
session_start();

if (!empty($_POST)) {

    $check_datas = allDatas($pdo, htmlentities($_POST['recipe_id']));

    if ($check_datas['user_id'] == $_SESSION['id']) {

        $recipe_id = htmlentities($_POST['recipe_id']);
        $title = htmlentities($_POST['title']);
        $description = htmlentities($_POST['description']);
        $user_id = htmlentities($_POST['user_id']);
        $category_id = htmlentities($_POST['category']);

        if (empty($_FILES) || $_FILES['image']['name'] == '') {

            $sql = "UPDATE recipes SET title = :title, description = :description, user_id = :user_id, category_id = :category_id WHERE id = :recipe_id";
            $query = $pdo->prepare($sql);

            $query->bindValue("title", $title);
            $query->bindValue("description", $description);
            $query->bindValue("user_id", $user_id);
            $query->bindValue("category_id", $category_id);
            $query->bindValue("recipe_id", $recipe_id);

            $query->execute();
            header("location: ../../public/controller/ShowMyCategories.php");
            exit();
        }
        if (!empty($_FILES) && $_FILES['image']['name'] != '') {

            move_uploaded_file($_FILES["image"]["tmp_name"], getcwd() . "/../src/img/" . $_FILES["image"]["name"]);
            $image = $_FILES['image']['name'];

            $sql = "UPDATE recipes SET title = :title, description = :description, image = :image, user_id = :user_id, category_id = :category_id WHERE id = :recipe_id";
            $query = $pdo->prepare($sql);

            $query->bindValue("title", $title);
            $query->bindValue("description", $description);
            $query->bindValue("image", $image);
            $query->bindValue("user_id", $user_id);
            $query->bindValue("category_id", $category_id);
            $query->bindValue("recipe_id", $recipe_id);

            $query->execute();
            header("location: ../../public/controller/ShowMyCategories.php");
            exit();
        }
    }
} else {
    header("location: Error.php?error=23");
}
