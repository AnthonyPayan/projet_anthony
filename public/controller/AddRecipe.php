<?php
require('../../libraries/services/functions.php');
$pdo = getPdo();

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
	$query->execute([$title, $description, $image, $user_id, $category_id]);
	header("location: /index.php");
	exit();
}
