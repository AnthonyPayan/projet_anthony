<section class="section-show-recipe">
    <article class="article-show-recipe">
        <section class="show-recipe-section-img">
            <h2><?= $recipe['title']; ?></h2>
            <img src="<?= $imgSrcAlt['src']; ?>" alt="<?= $imgSrcAlt['alt']; ?>">
        </section>
        <section class="show-recipe-detail">
            <p class="p-detail">Posté par <?= $user['nickname']; ?></p>
            <p class="p-detail">Le <?= $date_recipe; ?></p>
            <p class="p-detail">Catégorie
                <a title="Afficher les recettes de la catégorie <?= $category['name']; ?>" href="../controller/ShowRecipes.php?category_id=<?= $recipe_category; ?>">
                    <?= $category['name']; ?>
                </a>
            </p>
        </section>

        <section class="show-recipe-ranked">

            <!-- Affichage notation -->
            <?php ranking($count['average']); ?>

            <a title="Voir les avis pour cette recette" href="../controller/ShowComments.php?recipe_id=<?= $recipe_id; ?>"><span>sur <?= $ranked_count['ranked_count']; ?> avis</span></a>

        </section>
    </article>
    <section class="show-recipe-section-link flex flex-wrap">
        <a href='../controller/NewComment.php?recipe_id=<?= $recipe['id']; ?>' class="<?= $classDisplay; ?>">
            Ajouter un commentaire
        </a>
    </section>
    <section class="show-recipe-description">
        <h3>Préparation :</h3>
        <p class="p-detail"><?= $recipe['description']; ?></p>
    </section>
</section>