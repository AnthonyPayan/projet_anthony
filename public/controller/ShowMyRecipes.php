<?php
$user_id = $_SESSION['id'];
$category_id = $_GET['category_id'];

if (empty($category_id)) {
   header("location :/profil.php?id=$user_id");
} else {
   $recipes = selectByWaW($pdo, 'recipes', 'category_id', 'user_id', $category_id, $user_id);
}
