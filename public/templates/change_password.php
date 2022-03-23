<?php
require('../../layout.php');


if (!empty($_GET['id'])) {

	$id = $_GET['id'];


	$user = selectOneBy($pdo, 'users', 'id', $id);

	echo
	"<form method=\"POST\" action=\"\">
			<section class=\"form-section\">
				<label for=\"new_password\" >Nouveau mot de passe</label>
				<input name=\"new_password\" type=\"password\" class=\"form-control\" id=\"new_password\" aria-describedby=\"emailHelp\">
			</section>
			<section class=\"form-section\">
				<label for=\"password_confirm\" >Confirmation du nouveau mot de passe</label>
				<input name=\"password_confirm\" type=\"password\" class=\"form-control\" id=\"password_confirm\">
				</section>
			<section class=\"form-section\">
				<label for=\"old_password\" >Ancien mot de passe</label>
				<input name=\"old_password\" type=\"password\" class=\"form-control\" id=\"old_password\">
				</section>
			<section class=\"form-section\">
				<button type=\"submit\" class=\"btn btn-success\">Envoyé</button>
			</section>
		</form>";


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
};
