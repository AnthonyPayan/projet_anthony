<section class="container flex-wrap">

    <?php foreach ($datas as $data) : ?>

        <article class="shadow effect-up">
            <a title="Afficher la recette" href="public/controller/ShowRecipe.php?recipe_id=<?= $data['recipe_id']; ?>&category_id=<?= $data['category_id']; ?>">
                <h4><?= $data['recipe_title']; ?></h4>
                <h5> de <?= $data['author']; ?></h5>
                <section class="relative">
                    <img src="<?= $data['srcImg']; ?>" alt="<?= $data['altImg']; ?>">
                    <p class="avatar"><?= $data['avatar']; ?></p>
                </section>
                <h6><?= $data['date']; ?></h6>
                <p>
                    <?php ranking($data['count_average']); ?>
                    <span>sur <?= $data['count_comments']; ?> avis</span>
                </p>
            </a>
        </article>

    <?php endforeach; ?>

</section>


<!-- Si il n'y à aucune recette -->
<section class="<?= $classNoRecipe; ?>">
    <p>Aucune recette n'a été trouvé</p>
    <a class="btn" href="/public/controller/NewRecipe.php">Ajoutez votre recette</a>
</section>


<section class="<?= $displayPagination; ?>">
    <?php foreach ($paginationViews as $paginationView) : ?>
        <a class='btn' href='__DIR__ /../index.php?page=<?= $paginationView["pagination"]; ?>'><?= $paginationView["pagination"]; ?></a>
    <?php endforeach ?>
</section>