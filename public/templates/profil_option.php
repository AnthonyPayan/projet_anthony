<section class="profil-head">
    <a href="/public/controller/Profil.php?user_id=<?= $_SESSION['id']; ?>">
        <span>Retour</span>
    </a>
</section>

<section class="profil-section">
    <section class="link">
        <a href="/public/controller/PreChangePassword.php?user_id=<?= $user["id"]; ?>">Changer de mot de passe</a>
        <a class="<?= $classDisplay; ?> danger user-delete" href="/public/controller/DeleteUserConfirm.php?user_id=<?= $user["id"]; ?>">Supprimer mon compte</a>
    </section>
</section>