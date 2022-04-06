<?php
require("../../libraries/services/functions.php");
session_start();


if (!empty($_GET['user_id']) && $_GET['user_id'] == $_SESSION['id']) {
    $user_id = $_GET['user_id'];
} else {
    header("location: error.php?error=2");
}

$template = "../../public/templates/change_password.php";
include("../../profil_layout.php");
