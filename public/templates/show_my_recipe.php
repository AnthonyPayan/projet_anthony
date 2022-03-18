<?php
include('../../profil_layout.php');


if (empty($_GET['recipe_id'])) {
    header("location: error.php?error=2");
    exit();
}

$recipe_id = $_GET['recipe_id'];
$recipe = selectOneBy($pdo, 'recipes', 'id', $recipe_id);

if ($recipe['user_id'] !== $_SESSION['id']) {
    header("location: error.php?error=5");
    exit();
}
if (empty($recipe)) {
    echo "Pas de recette à afficher";
    echo "<a href=\"categories.php\">Retour à l'affichage des recettes</a><br>";
    exit();
}

$recipe_category = $recipe['category_id'];
$category = selectOneBy($pdo, 'categories', 'id', $recipe_category);
$user = selectOneBy($pdo, 'users', 'id', $recipe['user_id']);
$ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id);
$count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
$date_recipe = showDate($recipe['date_recipe']);
?>


<section class="section-show-recipe">
    <article class="article-show-recipe">
        <section class="show-recipe-section-img">

            <?php if (!empty($recipe['image'])) : ?>
                <img src="/public/src/img/<?= $recipe['image']; ?>" alt="image qui représente">
            <?php else : ?>
                <img src="https://via.placeholder.com/350x150" alt="image qui représente">
            <?php endif; ?>

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

                <a href="show_comments.php?recipe_id=<?= $recipe_id; ?>"><span>sur <?= $ranked_count['ranked_count']; ?> avis</span></a>

            <?php else : ?>
                <span>sur <?= $ranked_count['ranked_count']; ?> avis</span>
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