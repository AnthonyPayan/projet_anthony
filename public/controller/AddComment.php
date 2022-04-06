<?php
require('../../libraries/services/functions.php');


if (isset($_POST)) {
	$ranked = intval($_POST['ranked']);
	$comment = htmlentities($_POST['comment']);
	$user_id = htmlentities($_POST['user']);
	$recipe_id = intval($_POST['recipe_id']);

	$sql = "INSERT INTO comments (comment, ranked, user_id, recipe_id)
			VALUES (?, ?, ?, ?)";
	$query = $pdo->prepare($sql);
	$query->execute([$comment, $ranked, $user_id, $recipe_id]);

	header("location: /public/controller/ShowComments.php?recipe_id=$recipe_id");
	exit();
} else {
	echo 'Pas de requête reçu dans AddComment.php';
}
