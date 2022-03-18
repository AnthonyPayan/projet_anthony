<?php
include('../../layout.php');
?>

<form method="POST" action="../controller/Login.php">

	<section class="form-section">
		<label for="nickname-input">Pseudonyme</label>
		<input id="nickname-input" name="nickname" type="text">
	</section>

	<section class="form-section">
		<label for="password-input">Mot de passe</label>
		<input id="password-input" name="password" type="password">
	</section>

	<section class="form-section">
		<button type="submit" class="btn">Connexion</button>
		<p class="p-detail">vous n'avez pas de compte ? <a href="registration.php">inscrivez-vous</a></p>
	</section>

</form>