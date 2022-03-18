<?php
require('../../libraries/services/functions.php');
$pdo = getPdo();


if (isset($_POST['category_name'])) {
    $category_name = htmlentities($_POST['category_name']);

    $sql = "INSERT INTO categories (categories.name) VALUES (?)";
    $query = $pdo->prepare($sql);
    $query->execute([$category_name]);

    header("location: ../templates/show_categories.php");
}
