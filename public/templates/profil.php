<section class="profil-head">

    <a title="Retour à l'accueil du site" class="zoom" href="/">Retour</a>
    <a class="zoom" href="/public/controller/ShowMyCategories.php">Mes recettes<?= $ifNotification; ?></a>
    <a class="zoom" href="/public/controller/ProfilOption.php?user_id=<?= $_SESSION['id']; ?>">Options</a>

</section>

<!-- Si une recette ce trouve dans la catégorie ATTENTE alors cette section s'affiche -->
<?php if (!empty($recipe_info['recipes_wait'])) : ?>
    <section class="container-info">
        <p>Une de vos recettes se trouve dans la catégorie "Attente"</p>
        <a href="/public/controller/PreUpdateRecipeCategory.php" class="btn">Modifier catégories.</a>
    </section>
<?php endif; ?>

<section class="profil-section">
    <p> Profil <span><?= $user["nickname"]; ?></span></p>
    <p> inscrit depuis le <span><?= date("d-m-Y", $timestamp); ?></span></p>
    <p> Recette(s) <span><?= $sum['recipe_count']; ?></span></p>
</section>