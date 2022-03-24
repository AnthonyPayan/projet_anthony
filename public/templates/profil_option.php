<?php
include('../../profil_layout.php');
include('../controller/ProfilOption.php');
?>

<section class="profil-head">
    <a href="/public/templates/profil.php?user_id=<?= $_SESSION['id']; ?>">
        <span>Retour</span>
    </a>
</section>

<section class="profil-section">
    <section class="link">
        <a href="change_password.php?user_id=<?= $user["id"]; ?>">Changer de mot de passe</a>

        <?php if ($_SESSION['role'] != ADMIN) : ?>
            <a class="danger user-delete" href="delete_user_confirm.php?user_id=<?= $user["id"]; ?>">Supprimer mon compte</a>
        <?php endif; ?>

    </section>
</section>