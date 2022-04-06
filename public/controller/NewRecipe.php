<?php
require('../../libraries/services/functions.php');

session_start();
// sessionCheck();

if (isset($_SESSION['role'])) {
    $user_id = $_SESSION['id'];
    $categories = selectAll($pdo, 'categories');
} else {
    var_dump($_SESSION);
    die('1');
    header("location: error.php?error=3");
}

$template = "../templates/add_recipe.php";
include("../../layout.php");
