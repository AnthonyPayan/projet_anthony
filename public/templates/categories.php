<section class='title'>
    <h3><?= $categorie_title; ?></h3>
</section>

<section <?= $classCategory; ?>>

    <?php foreach ($recipeNumber as $categoryId => $category) : ?>
        <a class="btn-number btn" href="/public/controller/ShowRecipes.php?category_id=<?= $categoryId; ?>">
            <span class="span-name"><?= $category['name']; ?></span>
            <span class="span-number"><?= $category['number']; ?></span>
        </a>
    <?php endforeach; ?>

</section>