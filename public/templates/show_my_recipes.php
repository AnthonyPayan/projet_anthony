<section class="title x95">
    <h3>Mes recettes</h3>
</section>

<section class="table-section x95">

    <section class="<?= $containerDisplay; ?>">
        <p>Désolé vous n'avez plus de recette à afficher</p>
        <a class="btn" href="/public/controller/Profil.php?user_id=<?= $_SESSION['id']; ?>">
            <span>Retour</span>
        </a>
    </section>

    <?php foreach ($recipes as $recipe) : ?>
        <?php $date = showDate($recipe['date_recipe']); ?>

        <section class="scroll-table flex-nowrap zoom-low">
            <span><?= substr($recipe['title'], 0, 10) . '...'; ?></span>
            <span><?= $date; ?></span>
            <a href="../controller/ShowMyRecipe.php?recipe_id=<?= $recipe['id']; ?>"><i class="fas fa-eye"></i></a>
            <a href="../controller/DeleteRecipe.php?recipe_id=<?= $recipe['id']; ?>&category_id=<?= $category_id; ?>"><i class="fas fa-trash"></i></a>
            <a href="../controller/PreUpdateRecipe.php?id=<?= $recipe['id']; ?>"><i class="fas fa-edit"></i></a>
        </section>

    <?php endforeach; ?>

</section>