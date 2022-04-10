<?php
require('../../libraries/services/functions.php');

session_start();
// sessionCheck();

if (isset($_SESSION['role'])) {
    $user_id = $_SESSION['id'];
    $categories = selectAll($pdo, 'categories');
} else {
    header("location: /public/controller/Error.php?error=3");
}

//Traitement de l'affichage des catégories dans le select
//only_one_category = Nombre de catégories présente en BDD

$only_one_category = countOneTable($pdo, 'id', 'count_category', 'categories');
$cats = [];
$number = 0;

foreach ($categories as $category) {

    if (
        $only_one_category['count_category'] == 1 ||
        ($only_one_category['count_category'] > 1 && $category['id'] != ATTENTE)
    ) {
        $cats[$number] = [
            "category_id" => $category['id'],
            "category_name" => $category['name']
        ];
        $number++;
    }
}

$template = "../templates/add_recipe.php";
include("../../layout.php");
