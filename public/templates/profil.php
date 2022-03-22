<?php
include('../../profil_layout.php');

if (!isset($_SESSION['role'])) {
    header("location: error.php?error=3");
} elseif (!isset($_GET)) {
    header("location: error.php?error=2");
} elseif (!isset($_GET['user_id'])) {
    header("location: error.php?error=2");
} elseif ($_GET['user_id'] !== $_SESSION['id']) {
    header("location: error.php?error=4");
}
$user_id = $_SESSION['id'];
$user = selectOneBy($pdo, 'users', 'id', $_GET['user_id']);
$timestamp = strtotime($user['registration_at']);

$sum = countAsWhere($pdo, 'id', 'recipe_count', 'recipes', 'user_id', $user['id']); ?>

<section class="profil-head">

    <a title="Retour à l'accueil du site" class="zoom" href="/">Retour</a>

    <?php if ($_SESSION) : ?>
        <?php
        $attente = ATTENTE;

        $recipe_info = countWaWfetch($pdo, 'id', 'recipes_wait', 'recipes', 'user_id', 'category_id', $user_id, $attente); ?>


        <?php if (!empty($recipe_info['recipes_wait'])) : ?>
            <a class="zoom" href="/public/templates/show_my_categories.php">Mes recettes<span class="text-white span-badge"><?= $recipe_info['recipes_wait']; ?></span></a>
        <?php else : ?>
            <a class="zoom" href="/public/templates/show_my_categories.php">Mes recettes</a>

        <?php endif; ?>
    <?php endif; ?>
    <a class="zoom" href="/public/templates/profil_option.php?user_id=<?= $_SESSION['id']; ?>">Options</a>
</section>
<?php if (!empty($recipe_info['recipes_wait'])) : ?>
    <section class="container-info">
        <p>Une de vos recettes se trouve dans la catégorie "Attente"</p>
        <a href="/public/templates/update_categories.php" class="btn">Modifier catégories.</a>
    </section>
<?php endif; ?>
<section class="profil-section">
    <p> Profil <span><?= $user["nickname"]; ?></span></p>
    <p> inscrit depuis le <span><?= date("d-m-Y", $timestamp); ?></span></p>
    <p> Recette(s) <span><?= $sum['recipe_count']; ?></span></p>
</section>