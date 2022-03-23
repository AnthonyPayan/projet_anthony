<?php
include('../../layout.php'); ?>

<section class="danger-section">

    <?php if (isset($_GET['user_id'])) : ?>

        <h4><span>Etes-vous sur de vouloir</span> supprimer votre compte ?</h4>
        <p>il n'y auras aucun moyen de récuperer votre compte après cette opération toutes vos recettes et tout les commentaires que vous avez posté serons également supprimé.</p>


        <a href="/public/templates/profil.php?user_id=<?= $_SESSION['id']; ?>" class="btn-success" type="button">Non <span>retour à mon profil</span></a>
        <a href="../controller/DeleteUser.php?id=<?= $_GET['user_id']; ?>" class="danger-link" type="button"><span>Oui je souhaite</span> supprimer mon compte</a>

    <?php else : ?>

        <h5>Erreur dans la matrice </h5>
        <a href="../controller/DeleteUser.php?id=<?= $_GET['user_id']; ?>" type="button">Retour profil</a>

    <?php endif; ?>
</section>