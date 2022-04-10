<section class="title">
    <h3><?= $my_category_title; ?></h3>


    <p class="<?= $displayLink; ?>"><a href="/public/controller/Profil.php?user_id=<?= $session_id; ?>">
            <span>Retour</span>
        </a></p>

</section>

<section <?= $classCategory; ?>>
    <?php foreach ($recipeNumber as $categoryId => $category) : ?>
        <a class="btn-number btn" href="/public/controller/ShowMyRecipes.php?category_id=<?= $categoryId; ?>">
            <span class="span-name"><?= $category['name']; ?></span>
            <span class="span-number"><?= $category['number']; ?></span>
        </a>
    <?php endforeach; ?>
</section>