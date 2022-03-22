<?php
include('../../profil_layout.php');

if (!isset($_SESSION['role'])) {
    header("location: error.php?error=3");
} elseif (!isset($_GET)) {
    header("location: error.php?error=2");
} elseif (!isset($_GET['user_id'])) {
    header("location: error.php?error=2");
} elseif ($_GET['user_id'] !== $_SESSION['id']) {
    header("location: error.php?error=4");
}

$user = selectOneBy($pdo, 'users', 'id', $_GET['user_id']);
$timestamp = strtotime($user['registration_at']); ?>

<section class="profil-head">
    <a href="/public/templates/profil.php?user_id=<?= $_SESSION['id']; ?>">
        <span>Retour</span>
    </a>
</section>

<section class="profil-section">
    <section class="link">
        <a href="change_password.php?id=<?= $user["id"]; ?>">Changer de mot de passe</a>
        <?php if ($_SESSION['role'] != ADMIN) : ?>
            <a class="danger user-delete" href="delete_user_confirm.php?user_id=<?= $user["id"]; ?>">Supprimer mon compte</a>
        <?php endif; ?>
    </section>
</section>