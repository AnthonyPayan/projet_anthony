<?php
include('../../admin_layout.php');

if (empty($_GET['user_id'])) {
    header("location: ../../public/templates/error.php?error=2");
} elseif (empty($_GET['category_id'])) {
    header("location: ../../public/templates/error.php?error=2");
} else {
    $category_id = $_GET['category_id'];
    $user_id =  $_GET['user_id'];
    $recipes = selectByWaW($pdo, 'recipes', 'category_id', 'user_id', $category_id, $user_id);
    if (empty($recipes)) {
        echo "<p><a href='/private/templates/show_user_categories.php?user_id=$user_id' class='btn btn-success' type='button'>Retour</a></p>";
        echo "Il n'y a plus de recette dans cette catégorie";
        exit();
    }
} ?>
<div class="grid_index m-5">
    <p><a href='/private/templates/show_user_categories.php?user_id=<?= $user_id; ?>' class='btn btn-success' type='button'>Retour</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Auteur</th>
                <th scope="col">Date</th>
                <th scope="col">Voir</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($recipes as $recipe) : ?>

                <?php $date = showDate($recipe['date_recipe']); ?>
                <?php $user_infos = selectOneBy($pdo, 'users', 'id', $recipe['user_id']); ?>
                <tr class="table-primary">
                    <td><?= $recipe['title']; ?></td>
                    <td><?= $recipe['description']; ?></td>
                    <td><?= $user_infos['nickname']; ?></td>
                    <td><?= $date; ?></td>
                    <td><a href="show_recipe.php?recipe_id=<?= $recipe['id']; ?>&category_id=<?= $category_id; ?>&user_id=<?= $user_id; ?>"><i class="fas fa-eye"></i></a></td>
                    <td><a href="../controller/DeleteRecipe.php?recipe_id=<?= $recipe['id']; ?>&page_name=show_recipes&category_id=<?= $category_id; ?>&user_id=<?= $user_id; ?>"><i class="fas fa-trash"></i></a></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('../layout_end.php'); ?>