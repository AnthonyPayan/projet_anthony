<section class="danger-section">

    <h4><span>Etes-vous sur de vouloir</span> supprimer votre compte ?</h4>
    <p>il n'y aura aucun moyen de récupérer votre compte après cette opération toutes vos recettes et tous les commentaires que vous avez postés seront également supprimés</p>

    <a href="/public/controller/Profil.php?user_id=<?= $session_id; ?>" class="btn-success" type="button">Non <span>retour à mon profil</span></a>
    <a href="../controller/DeleteUser.php?id=<?= $user_id; ?>" class="danger-link" type="button"><span>Oui je souhaite</span> supprimer mon compte</a>

</section>