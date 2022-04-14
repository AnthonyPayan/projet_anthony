<?php
session_start();


$classDisplaySession = "displaynone";
$classDisplaySessionEmpty = NULL;

// Traitement des notifications dans la navigation.
if ($_SESSION['id'] != NULL) {

    $session_id = $_SESSION['id'];
    $attente = ATTENTE;
    $recipe_info = countWaWfetch($pdo, 'id', 'recipes_wait', 'recipes', 'user_id', 'category_id', $session_id, $attente);

    $classDisplaySession = NULL;
    $classDisplaySessionEmpty = "displaynone";

    if (!empty($recipe_info['recipes_wait'])) {
        $notifWait = '<span class="span-badge">' . $recipe_info["recipes_wait"] . '</span>';
    } else {
        $notifWait = NULL;
    }
}
