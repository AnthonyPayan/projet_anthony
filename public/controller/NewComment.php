<?php
require("../../libraries/services/functions.php");

session_start();

if (!isset($_SESSION['role'])) {
    header("location: error.php?error=3");
}
if (!isset($_GET['recipe_id'])) {
    header("location: error.php?error=2");
} else {
    $recipe_id = $_GET['recipe_id'];
    $recipe_check = selectOneByFetch($pdo, 'id', 'recipes', 'id', $recipe_id);
}
if ($recipe_check == false) {
    header("location: error.php?error=1");
}

$template = "../templates/add_comment.php";
include('../../layout.php');
