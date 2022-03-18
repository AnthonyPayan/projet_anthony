<?php
include('../../layout.php');
?>

<section class="title">
    <h1 class="text-success">Inscription</h1>
</section>

<form method="POST" action="../controller/Registration.php">
    <section class="form-section">
        <label for="exampleInputEmail1">Pseudonyme (Visible publiquement)</label>
        <input name="nickname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </section>
    <section class="form-section">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </section>
    <section class="form-section">
        <label for="exampleInputPassword1">Vérification du mot de passe</label>
        <input name="password_confirm" type="password" class="form-control" id="exampleInputPassword1">
    </section>
    <section class="form-section">
        <button type="submit" class="btn">Envoyé</button>
        <p class="p-detail">Vous avez déjà un compte ? <a href="Login.php">connectez-vous</a></p>
    </section>
</form>