<?php
include('../../layout.php');

if ($_GET['recipe_id']) {

    $recipe_id = $_GET['recipe_id'];
} else {
    header("location: error.php?error=2");
}

$recipe = selectOneBy($pdo, 'recipes', 'id', $recipe_id);


if ($recipe == false) {
    header("location: error.php?error=1");
}
$recipe_category = $recipe['category_id'];
$category = selectOneBy($pdo, 'categories', 'id', $recipe_category);
$user = selectOneBy($pdo, 'users', 'id', $recipe['user_id']);
$date_recipe = showDate($recipe['date_recipe']);
$count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
$ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id); ?>

<section class="section-show-recipe">
    <article class="article-show-recipe">
        <section class="show-recipe-section-img">
            <h2><?= $recipe['title']; ?></h2>

            <?php if (!empty($recipe['image'])) : ?>
                <img src="/public/src/img/<?= $recipe['image']; ?>" alt="<?= $recipe['title']; ?>">
            <?php else : ?>
                <img src="https://via.placeholder.com/350x150" alt="Cette recette ne comporte pas d'image ceci est une image de remplacement">
            <?php endif; ?>

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
                <span><?= $ranked_count['ranked_count']; ?><i class="far fa-comment"></i></span>
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