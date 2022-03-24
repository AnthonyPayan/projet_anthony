<?php
include('../../profil_layout.php');
include('../controller/ShowMyRecipe.php');
?>


<section class="section-show-recipe">
    <article class="article-show-recipe">
        <section class="show-recipe-section-img">

            <img src="<?= $srcImg; ?>" alt="<?= $altImg; ?>">

        </section>
        <section class="show-recipe-detail">
            <h4><?= $recipe['title']; ?></h4>
            <p class="p-detail">Posté par <?= $user['nickname']; ?></p>
            <p class="p-detail">Le <?= $date_recipe; ?></p>
            <p class="p-detail">Catégorie
                <a href="show_recipes.php?category_id=<?= $recipe_category; ?>">
                    <?= $category['name']; ?>
                </a>
            </p>
        </section>

        <section class="show-recipe-ranked">
            <?php ranking($count['average']); ?>
            <?php if ($ranked_count['ranked_count'] > 0) : ?>

                <a href="show_comments.php?recipe_id=<?= $recipe_id; ?>">
                    <span>sur <?= $ranked_count['ranked_count']; ?> avis</span>
                </a>

            <?php else : ?>
                <span>sur 0 avis</span>
            <?php endif; ?>

        </section>
        <section class="show-recipe-description">
            <h3>Préparation</h3>
            <p class="p-detail"><?= $recipe['description']; ?></p>
        </section>
        <section class="link">
            <a href="show_my_recipes.php?category_id=<?= $recipe_category; ?>">Retour à mes recettes</a>
        </section>
    </article>
</section>