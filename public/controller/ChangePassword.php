<?php
require("../../libraries/services/functions.php");
session_start();

if (!empty($_GET['user_id']) && $_GET['user_id'] == $_SESSION['id']) {

    $id = $_GET['user_id'];
    $user = selectOneBy($pdo, 'users', 'id', $id);

    if (!empty($_POST)) {

        $errors = [];

        if (empty($_POST['new_password']) || $_POST['new_password'] != $_POST['password_confirm']) {
            $errors['password'] = 'Les mot de passe ne correspondent paaaaaaaaaaas.';
        }

        if (empty($_POST['old_password']) || !password_verify($_POST['old_password'], $user['password'])) {
            $errors['password'] = 'L\'ancien mot de passe n\'est pas valide.';
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

    if (!empty($errors)) {
        echo '<div class="alert alert-danger">
			<p>Vous n\'avez pas rempli le formulaire correctement.</p>
			<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul></div>';
    }
} else {
    header("location: error.php?error=2");
};
