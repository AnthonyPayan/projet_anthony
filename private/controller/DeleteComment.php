<?php
require('../../libraries/services/functions.php');
$pdo = getPdo();

if (!empty($_GET['id'])) {
    $comment_id = $_GET['id'];
    $recipe_id = $_GET['recipe'];

    deleteById($pdo, 'comments', 'id', $comment_id);
    header("location: ../templates/show_comment.php?recipe_id=$recipe_id");
    exit();
} else {
    echo "<p>Pas de commentaire à supprimer</p>";
}
