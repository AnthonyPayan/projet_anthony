<?php
require('../../libraries/services/functions.php');

if (!empty($_POST['nickname'])) {
    $nickname = $_POST['nickname'];
    $user = selectOneBy($pdo, "users", 'nickname', $nickname);

    if (!empty($user)) {

        if (password_verify($_POST['password'], $user['password'])) {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['user'] = $user['nickname'];
            $_SESSION['avatar'] = $user['avatar'];
            header('location: /index.php');
        } else {
            header('location: /public/templates/error.php?error=7');
        }
    } else {
        header('location: /public/templates/error.php?error=8');
    }
} else {
    header('location: /public/templates/error.php?error=9');
}
