<?php
include('../../admin_layout.php');

$recipes = selectAll($pdo, 'recipes');
?>

<div class="grid_index m-5">
    <h3> Liste des recettes </h3>

    <?php if (empty($recipes)) : ?>
        <p>Il n'y à plus de recette à afficher</p>
        <p><a href='/private/index.php' class='btn btn-success' type='button'>Accueil admin</a></p>
        <?php exit(); ?>
    <?php endif; ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">titre recette</th>
                <th scope="col">Date de publication</th>
                <th scope="col">Auteur</th>
                <th scope="col">Voir recette</th>
                <th scope="col">Voir commentaire</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipes as $recipe) : ?>


                <?php $date = showDate($recipe['date_recipe']); ?>


                <?php $user = selectOneByFetch($pdo, 'nickname', 'users', 'id', $recipe['user_id']); ?>


                <?php $comments = showCommentsById($pdo, $recipe['id']); ?>


                <?php $count_comment = countAsWhere($pdo, 'comment', 'nb', 'comments', 'recipe_id', $recipe['id']); ?>

                <tr class="table-primary">
                    <th scope="row"><?= $recipe['title']; ?></th>
                    <td><?= $date; ?></td>
                    <td><?= $user['nickname']; ?></td>
                    <td><a href="show_recipe.php?recipe_id=<?= $recipe['id']; ?>&category_id=<?= $recipe['category_id']; ?>&user_id=<?= $recipe['user_id']; ?>&page_name=recipes"><i class="fas fa-eye"></i></a></td>


                    <?php if (!empty($comments)) : ?>
                        <td>
                            <a href="show_comment.php?recipe_id=<?= $recipe['id']; ?>"><i class="fas fa-eye"></i></a>
                            <span class="number_comment"> (<?= $count_comment['nb']; ?>)</span>
                        </td>
                    <?php else : ?>
                        <td><i class="fas fa-times"></i></td>
                    <?php endif; ?>
                    <td>
                        <a href="../controller/DeleteRecipe.php?recipe_id=<?= $recipe['id']; ?>&page_name=recipes&category_id=<?= $recipe['category_id']; ?>&user_id=<?= $recipe['user_id']; ?>"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('../layout_end.php'); ?>