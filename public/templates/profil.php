<?php
include('../../profil_layout.php');
include('../controller/Profil.php');
?>

<section class="profil-head">

    <a title="Retour à l'accueil du site" class="zoom" href="/">Retour</a>
    <a class="zoom" href="/public/templates/show_my_categories.php">Mes recettes<?= $ifNotification; ?></a>
    <a class="zoom" href="/public/templates/profil_option.php?user_id=<?= $_SESSION['id']; ?>">Options</a>

</section>

<!-- Si une recette ce trouve dans la catégorie ATTENTE alors cette section s'affiche -->
<?php if (!empty($recipe_info['recipes_wait'])) : ?>
    <section class="container-info">
        <p>Une de vos recettes se trouve dans la catégorie "Attente"</p>
        <a href="/public/templates/update_categories.php" class="btn">Modifier catégories.</a>
    </section>
<?php endif; ?>

<section class="profil-section">
    <p> Profil <span><?= $user["nickname"]; ?></span></p>
    <p> inscrit depuis le <span><?= date("d-m-Y", $timestamp); ?></span></p>
    <p> Recette(s) <span><?= $sum['recipe_count']; ?></span></p>
</section>