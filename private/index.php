<?php

include('../admin_layout.php');

$result_recipes = countOneTable($pdo, "id", "recipes_count", "recipes");
$result_users = countOneTable($pdo, "id", "users_count", "users");
$result_comments = countOneTable($pdo, "id", "comments_count", "comments");
$result_categories = countOneTable($pdo, "id", "categories_count", "categories");
?>

<div class="grid_index m-5">
  <h3>Informations général</h3>
  <p>Utilisateurs inscrit <a class="link" href="/private/templates/users.php"><?= $result_users["users_count"]; ?></a></p>
  <p>Recettes posté <a class="link" href="/private/templates/recipes.php"><?= $result_recipes["recipes_count"]; ?></a></p>
  <p>Catégories disponible <a class="link" href="/private/templates/show_categories.php"><?= $result_categories["categories_count"]; ?></a></p>
  <p>Commentaires posté <span class="text-info"><?= $result_comments["comments_count"]; ?></span></p>
</div>
<?php include('../layout_end.php'); ?>