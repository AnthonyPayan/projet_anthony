<?php

if (!isset($_SESSION['role'])) {
    header("location: error.php?error=3");
} elseif (!isset($_GET)) {
    header("location: error.php?error=2");
} elseif (!isset($_GET['user_id'])) {
    header("location: error.php?error=2");
} elseif ($_GET['user_id'] !== $_SESSION['id']) {
    header("location: error.php?error=4");
}

$user = selectOneBy($pdo, 'users', 'id', $_GET['user_id']);
$timestamp = strtotime($user['registration_at']);
