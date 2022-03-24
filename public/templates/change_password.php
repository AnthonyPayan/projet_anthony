<?php
require('../../layout.php');

if (!empty($_GET['user_id']) && $_GET['user_id'] == $_SESSION['id']) {
	$user_id = $_GET['user_id'];
} else {
	header("location: error.php?error=2");
}
?>

<form method="POST" action="../controller/ChangePassword.php?user_id=<?= $user_id; ?>">
	<section class="form-section">
		<label for="new_password">Nouveau mot de passe</label>
		<input name="new_password" type="password" class="form-control" id="new_password" aria-describedby="emailHelp">
	</section>
	<section class="form-section">
		<label for="password_confirm">Confirmation du nouveau mot de passe</label>
		<input name="password_confirm" type="password" class="form-control" id="password_confirm">
	</section>
	<section class="form-section">
		<label for="old_password">Ancien mot de passe</label>
		<input name="old_password" type="password" class="form-control" id="old_password">
	</section>
	<section class="form-section">
		<button type="submit" class="btn btn-success">Envoyé</button>
	</section>
</form>