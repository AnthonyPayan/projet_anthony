<?php
include('../../admin_layout.php');

if (empty($_GET['user_id'])) {
    header("location: ../../public/templates/error.php?error=2");
    exit();
} else {
    $user_id = $_GET['user_id'];

    $user_info = searchById($pdo, $user_id);
}
if (empty($user_info)) {
    header("location: location: ../../public/templates/error.php?error=2");
    exit();
}

$date_profil = showDate($user_info['registration_at']); ?>

<div class="grid_index m-5">
    <p class="text-info">Profil de : <?= $user_info['nickname']; ?></p>

    <?php if ($user_info['role'] == USERS) : ?>
        <p class='text-info'> Role : "utilisateur"</p>
    <?php elseif ($user_info['role'] == ADMIN) : ?>
        <p class='text-danger'> Role "administrateur"</p>
    <?php endif; ?>

    <p class="text-info">Date d'inscription : <?= $date_profil; ?></p>

    <?php $nb_recipe = countAsWhere($pdo, 'user_id', 'nb_recipe', 'recipes', 'user_id', $user_id); ?>

    <p class="text-info">Nombre de recette : <?= $nb_recipe['nb_recipe']; ?></p>


    <?php $nb_comment = countAsWhere($pdo, 'user_id', 'nb_comment', 'comments', 'user_id', $user_id); ?>
    <p class="text-info">Nombre de commentaire : <?= $nb_comment['nb_comment']; ?></p>

    <div class="alert alert-danger">
        <strong>Ête-vous sur de vouloir supprimer le profil de <?= $user_info['nickname']; ?> ?</strong>
        <br>
        <br>
        <p>Ce choix est irréversible il entraine la suppréssion du profil, des recettes qui y sont liées, et aussi les commentaires.</p>
        <br>
        <a href="../controller/DeleteUser.php?user_id=<?= $user_id; ?>" class="alert-link">Je souhaite supprimer ce profile.</a>
    </div>

    <p><a href="users.php" class="btn btn-success" type="button">Retour à la liste des utilisateurs</a></p>
</div>
<?php include('../layout_end.php'); ?>