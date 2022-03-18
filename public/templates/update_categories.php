<?php

include('../../layout.php');


if ($_SESSION) {
    $user_id = $_SESSION['id'];
    $categories = selectAll($pdo, 'categories');
    $recipe_infos = selectByWaW($pdo, 'recipes', 'user_id', 'category_id', $user_id, ATTENTE);
} ?>

<?php foreach ($recipe_infos as $recipe_info) : ?>
    <section class="update-container">

        <h3><a href="show_my_recipe.php?recipe_id=<?= $recipe_info['id']; ?>"> <?= $recipe_info['title']; ?></a></h3>


        <form method="POST" action="../controller/UpdateRecipeCategory.php" enctype="multipart/form-data">


            <input id="user_id" name="user_id" type="hidden" value="<?= $user_id; ?>">
            <input id="user_id" name="recipe_id" type="hidden" value="<?= $recipe_info['id']; ?>">


            <label for="categoryChoice">Choix de la catégorie</label>
            <select name="category_id" class="form-control" id="categoryChoice">

                <?php foreach ($categories as $category) : ?>

                    <?php if ($category['id'] == $recipe_info['category_id']) : ?>
                        <option value="<?= $category['id']; ?>" selected><?= $category['name']; ?></option>
                    <?php else : ?>
                        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                    <?php endif; ?>

                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn btn-success">Envoyez !</button>
        </form>
    </section>
<?php endforeach; ?>