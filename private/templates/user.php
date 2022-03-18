<?php
include('../../admin_layout.php');

if (empty($_GET['user_id'])) {
    header("location: ../../public/templates/error.php?error=2");
} else {
    $user_id = $_GET['user_id'];

    $sql = "SELECT nickname, role, avatar, registration_at, id FROM users WHERE id = $user_id";
    $query = $pdo->prepare($sql);
    $query->execute();
    $user_info = $query->fetch();
}
if ($user_id != $user_info['id']) {
    echo "<p>Cet utilisateur n'existe pas</p>";
    echo "<p><a href='users.php' class='btn btn-success' type='button'>Retour à la liste des utilisateurs</a></p>";
    exit();
} else {
    $date_profil = showDate($user_info['registration_at']);
} ?>
<div class="grid_index m-5">
    <p class="text-info">Profil de : <?= $user_info['nickname']; ?></p>

    <?php if ($user_info['role'] == 3) : ?>
        <p class='text-info'> Role : "utilisateur"</p>
    <?php elseif ($user_info['role'] == ADMIN) : ?>
        <p class='text-danger'> Role "administrateur"</p>
    <?php endif; ?>

    <p class="text-info">Date d'inscription : <?= $date_profil; ?></p>

    <?php $nb_recipe = countAsWhere($pdo, 'user_id', 'nb_recipe', 'recipes', 'user_id', $user_id); ?>
    <p class="text-info">Nombre de recette : <?= $nb_recipe['nb_recipe']; ?></p>


    <?php $nb_comment = countAsWhere($pdo, 'user_id', 'nb_comment', 'comments', 'user_id', $user_id); ?>
    <p class="text-info">Nombre de commentaire : <?= $nb_comment['nb_comment']; ?></p>

    <?php if ($user_info['role'] != ADMIN) : ?>
        <p><a href="confirm_delete_user.php?user_id=<?= $user_id; ?>" class="text-danger">Supprimer l'utilisateur</a></p>
    <?php endif; ?>


    <p><a href="users.php" class="btn btn-success" type="button">Retour à la liste des utilisateurs</a></p>
</div>
<?php include('../layout_end.php'); ?>