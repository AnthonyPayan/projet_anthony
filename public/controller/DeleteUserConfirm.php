<?php
require("../../libraries/services/functions.php");
session_start();

if (isset($_SESSION['id'])) {
    $session_id = $_SESSION['id'];

    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
    } else {
        header("location: /public/controller/Error.php?error=6");
    }
} else {
    header("location: /public/controller/Error.php?error=6");
}

$template = "../templates/delete_user_confirm.php";
include("../../profil_layout.php");
