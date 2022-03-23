<?php
include('../../admin_layout.php');

$categories = selectAll($pdo, 'categories');

if (empty($categories)) {
    echo "il n'y à pas de catégorie à afficher";
    exit();
}

$recipes = selectAll($pdo, 'recipes');; ?>
<div class="grid_index m-5">
    <h2>Liste des catégories</h2>
    <form method="POST" action="../controller/AddCategory.php">

        <div class="form-group">
            <p>Nom de la catégorie à ajouter</p>
            <div class="form-floating mb-3">
                <input name="category_name" type="text" class="form-control" id="category_name" placeholder="Nom de la catégorie">
                <label for="category_name">Potage... Salade... Etc...</label>
            </div>
            <button type="submit" class="btn btn-success">Ajouter !</button>
    </form>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Catégorie</th>
                <th scope="col">Nombre de recette</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($categories as $category) {
                $count_category = countAsWhere($pdo, 'category_id', 'count_category', 'recipes', 'category_id', $category['id']);
                echo '<tr class="table-primary">
                            <td>' . $category['name'] . '</td>
                            <td>' . $count_category['count_category'] . '</td>';
                if ($category['id'] == ATTENTE) {
                    echo   '<td><i class="fas fa-times"></i></td>';
                } else {
                    echo   '<td><a href="confirm_delete_category.php?category_id=' . $category['id'] . '"><i class="fas fa-trash"></i></a></td>
                        </tr>';
                }
            }; ?>

        </tbody>
    </table>
</div>
<?php include('../layout_end.php'); ?>