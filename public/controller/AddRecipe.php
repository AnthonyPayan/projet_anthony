<?php
require('../../libraries/services/functions.php');


if (!empty($_POST)) {

	move_uploaded_file($_FILES["image"]["tmp_name"], getcwd() . "/../src/img/" . $_FILES["image"]["name"]);
	$title = htmlentities($_POST['title']);
	$description = htmlentities($_POST['description']);
	$user_id = $_POST['user_id'];
	$image = $_FILES['image']['name'];
	$category_id = $_POST['category'];

	$sql = "INSERT INTO recipes (title, description, image, user_id, category_id)
		   VALUES (?, ?, ?, ?, ?)";

	$query = $pdo->prepare($sql);

	$query->bindValue(1, $title, PDO::PARAM_STR);
	$query->bindValue(2, $description, PDO::PARAM_STR);
	$query->bindValue(3, $image, PDO::PARAM_STR);
	$query->bindValue(4, $user_id, PDO::PARAM_INT);
	$query->bindValue(5, $category_id, PDO::PARAM_STR);

	$query->execute();

	header("location: /index.php");
	exit();
}
