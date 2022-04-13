<section class="title">
    <h1 class="text-success">Inscription</h1>
</section>

<form method="POST" action="../controller/Registration.php">
    <section class="form-section">
        <label for="nickname">Pseudonyme (Visible publiquement)</label>
        <input name="nickname" type="text" class="form-control" id="nickname" aria-describedby="emailHelp">
    </section>
    <section class="form-section">
        <label for="password">Mot de passe</label>
        <input name="password" type="password" class="form-control" id="password">
    </section>
    <section class="form-section">
        <label for="password_confirm">Vérification du mot de passe</label>
        <input name="password_confirm" type="password" class="form-control" id="password_confirm">
    </section>
    <section class="form-section">
        <button type="submit" class="btn">Envoyé</button>
        <p class="p-detail">Vous avez déjà un compte ? <a href="PreLogin.php">connectez-vous</a></p>
    </section>
</form>