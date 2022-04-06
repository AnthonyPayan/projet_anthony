<?php
session_start();

// Traitement des notifications dans la navigation.
if ($_SESSION) {
    $session_id = $_SESSION['id'];
    // $session_name = selectOneByFetch($pdo, 'nickname', 'users', 'id', $session_id);
    $attente = ATTENTE;
    $recipe_info = countWaWfetch($pdo, 'id', 'recipes_wait', 'recipes', 'user_id', 'category_id', $session_id, $attente);
}
