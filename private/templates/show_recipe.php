<?php
include('../../admin_layout.php');

if (empty($_GET['recipe_id'])) {
    header("location: ../../public/templates/error.php?error=2");
    exit();
} else {
    $id_recipe = $_GET['recipe_id'];
    $recipe = selectOneBy($pdo, 'recipes', 'id', $id_recipe);
    $category_id = $_GET['category_id'];
}
if (empty($recipe)) {
    header("location: ../../public/templates/error.php?error=2");
    exit();
} else {

    $author_recipe = selectOneBy($pdo, 'users', 'id', $recipe['user_id']);
}
if (empty($author_recipe)) {
    header("location: ../../public/templates/error.php?error=2");
} ?>

<div class="grid_index m-5">

    <h3><?= $recipe['title']; ?></h3>
    <p><?= $recipe['description']; ?></p>
    <p><?= $author_recipe['nickname']; ?></p>
    <p><?= $recipe['date_recipe']; ?></p>

    <?php if (!empty($recipe['image'])) : ?>
        <img src="/public/src/img/<?= $recipe['image']; ?>" alt="image qui représente">
    <?php else : ?>
        <img src="https://via.placeholder.com/350x150" alt="image qui représente">
    <?php endif; ?>

    <br>
    <a href="/private/templates/recipes.php">Retour à l'affichage des recettes</a>
    <br>
    <a href="/private/templates/user.php?user_id=<?= $author_recipe['id']; ?>">Voir profil de l'auteur</a>
    <br>
    <a href="../controller/DeleteRecipe.php?recipe_id=<?= $recipe['id']; ?>&page_name=show_recipe&category_id=<?= $category_id; ?>&user_id=<?= $author_recipe['id']; ?>">Supprimer la recette</a>
</div>
<?php include('../layout_end.php'); ?>