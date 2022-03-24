<?php
include('../../layout.php');
include('../controller/ShowCategories.php'); ?>


<!-- Affichage du titre -->
<section class='title'>
    <h3><?= $categorie_title; ?></h3>
</section>

<!-- Affichage des catégories ou des liens-->
<section <?= $classCategory; ?>>

    <?php foreach ($recipeNumber as $categoryId => $category) : ?>
        <a class="btn-number btn" href="/public/templates/show_recipes.php?category_id=<?= $categoryId; ?>">
            <span class="span-name"><?= $category['name']; ?></span>
            <span class="span-number"><?= $category['number']; ?></span>
        </a>
    <?php endforeach; ?>

</section>