<?php
include('../../layout.php');
include('../controller/ShowRecipe.php');
?>

<section class="section-show-recipe">
    <article class="article-show-recipe">
        <section class="show-recipe-section-img">
            <h2><?= $recipe['title']; ?></h2>
                <img src="<?= $srcImg ;?>" alt="<?= $altImg; ?>">
        </section>
        <section class="show-recipe-detail">
            <p class="p-detail">Posté par <?= $user['nickname']; ?></p>
            <p class="p-detail">Le <?= $date_recipe; ?></p>
            <p class="p-detail">Catégorie
               <a title="Voir les recettes de la catégorie <?= $category['name']; ?>" href="show_recipes.php?category_id=<?= $recipe_category; ?>">
                  <?= $category['name']; ?>
               </a>
            </p>
        </section>

        <section class="show-recipe-ranked">

            <?php ranking($count['average']); ?>

            <?php if ($ranked_count['ranked_count'] > 0) : ?>

                <a title="Voir les avis pour cette recette" href="show_comments.php?recipe_id=<?= $recipe_id; ?>"><span>sur <?= $ranked_count['ranked_count']; ?> avis</span></a>

            <?php else : ?>
                <span>0<i class="far fa-comment"></i></span>
            <?php endif; ?>

        </section>
    </article>
    <section class="show-recipe-section-link flex flex-wrap">
        <?php if ($_SESSION) : ?>
            <a href='add_comment.php?recipe_id=<?= $recipe['id']; ?>' class="btn-number btn">
                Ajouter un commentaire
            </a>
        <?php endif; ?>
    </section>
    <section class="show-recipe-description">
        <h3>Préparation :</h3>
        <p class="p-detail"><?= $recipe['description']; ?></p>
    </section>
</section>
