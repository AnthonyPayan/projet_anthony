<?php
require("../../libraries/services/functions.php");
session_start();

if ($_SESSION) {
    $user_id = $_SESSION['id'];
    $categories = selectAll($pdo, 'categories');
    $recipe_infos = selectByWaW($pdo, 'recipes', 'user_id', 'category_id', $user_id, ATTENTE);
}

//TODO Faire un systeme de tableau dans un tableau dans PreUpdateRecipeCategory.php 
//TODO pour exporter ici le resulter et l'exploiter avec un foreach().

$template = "../templates/update_categories.php";
include("../../profil_layout.php");
