<section class="danger-section">

    <h4><span>Etes-vous sur de vouloir</span> supprimer votre compte ?</h4>
    <p>il n'y auras aucun moyen de récuperer votre compte après cette opération toutes vos recettes et tout les commentaires que vous avez posté serons également supprimé.</p>

    <a href="/public/controller/Profil.php?user_id=<?= $session_id; ?>" class="btn-success" type="button">Non <span>retour à mon profil</span></a>
    <a href="../controller/DeleteUser.php?id=<?= $user_id; ?>" class="danger-link" type="button"><span>Oui je souhaite</span> supprimer mon compte</a>

</section>