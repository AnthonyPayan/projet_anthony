<?php
include('../../admin_layout.php');

if (empty($_GET['user_id'])) {
    header("location: ../../public/templates/error.php?error=2");
} else {
    $user_id = $_GET['user_id'];
    $recipes = selectOneByAll($pdo, 'category_id', 'recipes', 'user_id', $user_id);
}
if (empty($recipes)) {
    echo "<p><a href='users.php' class='btn btn-success' type='button'>Retour à la liste des utilisateurs</a></p>";
    echo "<p>Il n'y à plus de recette pour cet utilisateur.</p>";
    exit();
}
$categories = selectAll($pdo, 'categories');

if (empty($categories)) {
    echo "<p>Désolé, une erreur est survenu.</p>";
    echo "<p><a href='users.php' class='btn btn-success' type='button'>Retour à la liste des utilisateurs</a></p>";
    exit();
} ?>
<div class="grid_index m-5">
    <p><a href='/private/templates/users.php' class='btn btn-success' type='button'>Retour</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Catégories</th>
                <th scope="col">Voir les recettes</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($categories as $category) {
                $i = 0;
                foreach ($recipes as $recipe) {
                    if ($recipe['category_id'] == $category['id']) {
                        $i++;
                    }
                }
                if ($i > 0) {
                    echo '<tr class="table-primary">
        <td><p href="show_recipes.php?category_id=' . $category['id'] . '&user_id=' . $user_id . '">' . $category['name'] . '<span>' . ' ' . '(' . $i . ')' . ' ' . '</span>' . '</p></td>
        <td><a href="show_recipes.php?category_id=' . $category['id'] . '&user_id=' . $user_id . '"><i class="fas fa-eye"></i></a></td>
        </tr>';
                }
            } ?>

        </tbody>
    </table>
</div>
<?php include('../layout_end.php'); ?>