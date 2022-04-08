<section class="title">
    <h3><?= $my_category_title; ?></h3>

    <!-- Extraire ce IF -->
    <?php if (empty($categories) || empty($recipes)) : ?>
        <p><a href="/public/templates/profil.php?user_id=<?= $session_id; ?>">
                <span>Retour</span>
            </a></p>
    <?php endif; ?>
</section>

<section <?= $classCategory; ?>>
    <?php foreach ($recipeNumber as $categoryId => $category) : ?>
        <a class="btn-number btn" href="/public/controller/ShowMyRecipes.php?category_id=<?= $categoryId; ?>">
            <span class="span-name"><?= $category['name']; ?></span>
            <span class="span-number"><?= $category['number']; ?></span>
        </a>
    <?php endforeach; ?>
</section>