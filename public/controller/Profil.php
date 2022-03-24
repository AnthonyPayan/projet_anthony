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
$user_id = $_SESSION['id'];
$user = selectOneBy($pdo, 'users', 'id', $_GET['user_id']);
$timestamp = strtotime($user['registration_at']);
$sum = countAsWhere($pdo, 'id', 'recipe_count', 'recipes', 'user_id', $user['id']);

//Logique pour affichage des notifications
if ($_SESSION) {
    $attente = ATTENTE;
    $recipe_info = countWaWfetch($pdo, 'id', 'recipes_wait', 'recipes', 'user_id', 'category_id', $user_id, $attente);

    if (!empty($recipe_info['recipes_wait'])) {
        $ifNotification = '<span class="text-white span-badge">' . $recipe_info['recipes_wait'] . '</span>';
    } else {
        $ifNotification = NULL;
    }
}
