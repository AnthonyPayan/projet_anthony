<?php
include('../../profil_layout.php');

$user_id = $_SESSION['id'];
$category_id = $_GET['category_id']; ?>

<section class="title x95">
    <h3>Mes recettes</h3>
</section>

<?php if (!empty($category_id)) : ?>
    <?php $recipes = selectByWaW($pdo, 'recipes', 'category_id', 'user_id', $category_id, $user_id); ?>

    <section class="table-section x95">

        <?php if (empty($recipes)) : ?>
            <section class="container-info">
                <p>Désolé vous n'avez plus de recette à afficher</p>
                <a class="btn" href="/public/templates/profil.php?user_id=<?= $_SESSION['id']; ?>">
                    <span>Retour</span>
                </a>
            </section>
        <?php endif; ?>

        <?php foreach ($recipes as $recipe) : ?>
            <?php $date = showDate($recipe['date_recipe']); ?>
            <section class="scroll-table flex-nowrap zoom-low">
                <span><?= substr($recipe['title'], 0, 10) . '...'; ?></span>
                <span><?= $date; ?></span>
                <a href="show_my_recipe.php?recipe_id=<?= $recipe['id']; ?>"><i class="fas fa-eye"></i></a>
                <a href="../controller/DeleteRecipe.php?recipe_id=<?= $recipe['id']; ?>&category_id=<?= $category_id; ?>"><i class="fas fa-trash"></i></a>
                <a href="update_recipe.php?id=<?= $recipe['id']; ?>"><i class="fas fa-edit"></i></a>
            </section>
        <?php endforeach; ?>
    </section>

<?php else : ?>
    <?php header("location :/profil.php?id=$user_id"); ?>
<?php endif; ?>