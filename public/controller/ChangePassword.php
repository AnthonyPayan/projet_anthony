<?php
require("../../libraries/services/functions.php");
session_start();

if (!empty($_GET['user_id']) && $_GET['user_id'] == $_SESSION['id']) {

    $id = $_GET['user_id'];
    $user = selectOneBy($pdo, 'users', 'id', $id);

    if (!empty($_POST)) {

        if (empty($_POST['new_password']) || empty($_POST['password_confirm']) || empty($_POST['old_password'])) {
            header("location: Error.php?error=9");
        }

        if ($_POST['new_password'] != $_POST['password_confirm']) {
            header("location: Error.php?error=10");
        }

        if (!password_verify($_POST['old_password'], $user['password'])) {
            header("location: Error.php?error=11");
        }

        if (empty($errors)) {
            $password = $_POST['new_password'];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $sql = "UPDATE users SET password = ? WHERE id = $id";
            $query = $pdo->prepare($sql);
            $query->execute([$hashed_password]);
            header("location: /index.php");
            exit();
        }
    }
} else {
    header("location: Error.php?error=2");
};
