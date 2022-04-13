<?php
require('../../libraries/services/functions.php');


if (isset($_POST)) {

	$comment = htmlentities($_POST['comment']);
	$ranked = intval($_POST['ranked']);
	$user_id = htmlentities($_POST['user']);
	$recipe_id = intval($_POST['recipe_id']);

	$sql = "INSERT INTO comments (comment, ranked, user_id, recipe_id)
			VALUES (?, ?, ?, ?)";

	$query = $pdo->prepare($sql);

	$query->bindValue(1, PDO::PARAM_STR);
	$query->bindValue(2, PDO::PARAM_STR);
	$query->bindValue(3, PDO::PARAM_INT);
	$query->bindValue(4, PDO::PARAM_STR);

	$query->execute([$comment, $ranked, $user_id, $recipe_id]);

	// [$comment, $ranked, $user_id, $recipe_id] ce trouve dans le execute

	header("location: /public/controller/ShowComments.php?recipe_id=$recipe_id");
	exit();
} else {

	header("location: Error.php?error=20");
}
