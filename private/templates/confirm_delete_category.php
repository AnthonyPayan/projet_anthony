<?php
include('../../admin_layout.php');

if (empty($_GET['category_id'])) {
    header("location: ../../public/templates/error.php?error=2");
    exit();
}

if (!empty($_GET['category_id'])) {
    $category_id = $_GET['category_id'];


    $category_info = selectOneBy($pdo, 'categories', 'id', $category_id);


    $nb_recipe = countAsWhere($pdo, 'category_id', 'nb_recipe', 'recipes', 'category_id', $category_info['id']);
} ?>

<div class="grid_index d-flex flex-column m-5">

    <div class="card text-white bg-info grid_index m-5" style="max-width: 20rem;">
        <div class="card-header">
            <h4 class="card-title">Information sur cette catégorie</h4>
        </div>
        <div class="card-body">
            <p>Nom de la categorie <strong><?= $category_info['name']; ?></strong></p>
            <p>Recette dans cette catégorie <strong><?= $nb_recipe['nb_recipe']; ?></strong></p>
        </div>
    </div>


    <div class="alert alert-danger grid_index m-5" style="max-width: 20rem;">
        <strong>Ête-vous sur de vouloir supprimer la catégorie <?= $category_info['name']; ?> ?</strong>

        <?php if ($nb_recipe['nb_recipe'] > 0) : ?>

            <p>La suppression de cette catégorie implique le changement catégorie de <?= $nb_recipe['nb_recipe']; ?> recette(s) elle seront placé dans la catégorie "Attente".</p>
            <p>Un méssage préviendra alors les utilisateurs qui ont posté c'est recettes pour qu'ils puissent les déplacer dans une autre catégorie existante.</p>
        <?php endif; ?>

        <a class="grid_index d-flex flex-column alert-link" href="../controller/DeleteCategory.php?category_id=<?= $category_id; ?>">Je souhaite supprimer cette catégorie.</a>
    </div>

    <p><a href="show_categories.php" class="btn btn-success grid_index m-5" type="button">Retour à la liste des catégories</a></p>
</div>
<?php include('../layout_end.php'); ?>