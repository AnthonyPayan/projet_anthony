<form method="POST" action="../controller/Login.php">

	<section class="form-section">
		<label for="nickname">Pseudonyme</label>
		<input id="nickname" name="nickname" type="text">
	</section>

	<section class="form-section">
		<label for="password">Mot de passe</label>
		<input id="password" name="password" type="password">
	</section>

	<section class="form-section">
		<button type="submit" class="btn">Connexion</button>
		<p class="p-detail">vous n'avez pas de compte ? <a title="S'inscrire" href="registration.php">inscrivez-vous</a></p>
	</section>

</form>