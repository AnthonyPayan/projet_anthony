<?php
include('../../profil_layout.php');

$categories = selectAll($pdo, 'categories');
$recipes = selectOneByAll($pdo, 'category_id', 'recipes', 'user_id', $_SESSION['id']);

if (!isset($_SESSION['id'])) {
    header("location: error.php?error=3");
} else {
    $session_id = $_SESSION['id'];
}
if (empty($categories)) {
    echo '<section class="title">';
    echo "<h5>Vous n'avez pas de recette.</h5>";
    echo '<p><a href="/public/templates/profil.php?user_id=' . $session_id . '"><span>Retour</span></a></p>';
    echo '</section>';
}
if (empty($recipes)) {
    echo '<section class="title">';
    echo "<h5>Vous n'avez pas de recettes !</h5>";
    echo '<p><a href="/public/templates/profil.php?user_id=' . $session_id . '"><span>Retour</span></a></p>';
    echo '</section>';
} else {
    echo '<section class="title">';
    echo "<h3>Mes recettes</h3>";
    echo '</section>';

    echo '<section class="categories_choice">';
    foreach ($categories as $category) {
        $i = 0;
        foreach ($recipes as $recipe) {
            if ($recipe['category_id'] == $category['id']) {
                $i++;
            }
        }
        if ($i > 0) {
            echo '<a class="btn btn-number" href="/public/templates/show_my_recipes.php?category_id=' . $category['id'] . '">' . '<span class="span-name">' . $category['name'] . '</span>' . ' ' .  '<span class="span-number">' . ' ' . $i . ' ' . '</span>' . '</a>';
        }
    }
    echo '</section>';
}
