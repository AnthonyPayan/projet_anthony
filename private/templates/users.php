<?php
include('../../admin_layout.php');

$users = selectAll($pdo, 'users'); ?>
<div class="grid_index m-5">
    <h2> Liste des utilisateurs </h2>

    <?php if (empty($users)) {
        echo "<p>Il n'y a pas d'utilisateur inscitpour l'instant</p>";
    }; ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Pseudo</th>
                <th scope="col">Date d'inscription</th>
                <th scope="col">Role</th>
                <th scope="col">Recette</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Voir profil</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($users as $user) : ?>
                <?php $date_profil = showDate($user['registration_at']); ?>

                <tr class="table-primary">
                    <th scope="row"><?= $user['nickname']; ?></th>
                    <td><?= $date_profil; ?></td>

                    <?php if ($user['role'] == ADMIN) : ?>
                        <td>Admin</td>
                    <?php elseif ($user['role'] == 3) : ?>
                        <td>Utilisateur</td>
                    <?php endif; ?>

                    <?php $nb_recipe = countAsWhere($pdo, 'user_id', 'nb_recipe', 'recipes', 'user_id', $user['id']); ?>

                    <?php if ($nb_recipe['nb_recipe'] > 0) : ?>
                        <td><a href="show_user_categories.php?user_id=<?= $user['id']; ?>"><i class="far fa-eye"></i></a><span class="number_comment">(<?= $nb_recipe['nb_recipe']; ?>)</span></td>
                    <?php else : ?>
                        <td><i class="fas fa-times"></i></td>
                    <?php endif; ?>

                    <?php $nb_comment = countAsWhere($pdo, 'user_id', 'nb_comment', 'comments', 'user_id', $user['id']); ?>

                    <td><?= $nb_comment['nb_comment']; ?></td>

                    <td><a href="user.php?user_id=<?= $user['id']; ?>"><i class="far fa-eye"></i></a></td>


                    <?php if ($user['role'] == ADMIN) : ?>
                        <td><i class="fas fa-times"></i></td>
                    <?php else : ?>
                        <td><a href="confirm_delete_user.php?user_id=<?= $user['id']; ?>"><i class="fas fa-trash"></i></a></td>
                    <?php endif; ?>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include('../layout_end.php'); ?>