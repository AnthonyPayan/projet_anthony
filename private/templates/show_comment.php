<?php
include('../../admin_layout.php'); ?>

<div class="grid_index m-5">

    <?php if (!empty($_GET['recipe_id'])) : ?>

        <?php $comments = showComments($pdo); ?>

        <?php if (!empty($comments)) : ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">titre recette</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Note</th>
                        <th scope="col">Supprimer commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comments as $comment) : ?>


                        <?php $user_name = selectOneByFetch($pdo, "nickname", "users", "id", $comment['user_id']); ?>

                        <tr class="table-primary">
                            <th scope="row"><?= $comment['title']; ?></th>
                            <td><?= $comment['comment']; ?></td>
                            <td><?= $user_name['nickname']; ?></td>
                            <td><?= $comment['ranked']; ?></td>
                            <td>
                                <a href="../controller/DeleteComment.php?id=<?= $comment['id']; ?>&recipe=<?= $comment['recipe_id']; ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
                <div class="card-header">
                    <h4 class="card-title">Information</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Il n'y à plus de commentaire à afficher pour cette recette</p>
                    <a class="text-white" href="/private/templates/recipes.php">Vous pouvez suivre ce lien pour retourner à la liste des recettes</a>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php include('../layout_end.php'); ?>