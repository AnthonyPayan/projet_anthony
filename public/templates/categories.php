<?php

include('../../layout.php');

$categories = selectAll($pdo, 'categories');
$recipes = selectAllByFetchAll($pdo, 'category_id', 'recipes');
$nb_category = count($categories);

echo "<section class='title'>";
if ($nb_category > 1 && !empty($recipes)) {
    echo "<h3>Les catégories contenant des recettes.</h3>";
} elseif ($nb_category == 1 && !empty($recipes)) {
    echo "<h3>La catégorie contenant des recette</h3>";
} elseif (empty($recipes)) {
    echo "<h3>Il n'y à pas de recette à afficher pour l'instant</h3>";
    if (isset($_SESSION['role'])) {
        echo "<p>Vous pouvez ajouté la première recette en suivant ce <a href='add_recipe.php'>lien</a></p>";
    } else {
        echo "<p>Vous pouvez retourner à l'accueil en suivant ce <a href='/index.php'>lien</a></p>";
        echo "<p>Vous pouvez vous connecter pour ajouter une recette en suivant ce <a href='Login.php'>lien</a></p>";
        echo "<a>Si vous n'avez pas de compte vous pouvez en créer un en suivant ce <a href='registration.php'>lien</a></p>";
    }
}
echo "</section>";
echo '<section class="categories_choice">';
foreach ($categories as $category) {
    $i = 0;
    foreach ($recipes as $recipe) {
        if ($recipe['category_id'] == $category['id']) {
            $i++;
        }
    }
    if ($i > 0) {
        echo '<a class="btn-number btn" href="/public/templates/show_recipes.php?category_id=' . $category['id'] . '">' . '<span class="span-name">' . $category['name'] . '</span>' . ' ' . '<span class="span-number">' . $i . '</span>' . '</a>';
    }
} ?>
</section>