<?php
include('../../profil_layout.php');

if ($_GET) : ?>
    <?php $recipe_id = $_GET['id']; ?>
    <?php $user_id = $_SESSION['id']; ?>
    <?php $recipe = selectOneBy($pdo, 'recipes', 'id', $recipe_id); ?>
    <?php $categories = selectAll($pdo, 'categories'); ?>


    <form method="POST" action="../controller/UpdateRecipe.php" enctype="multipart/form-data">

        <input id="user_id" name="user_id" type="hidden" value="<?= $user_id; ?>">
        <input id="user_id" name="recipe_id" type="hidden" value="<?= $recipe_id; ?>">

        <section class="form-section">
            <label for="categoryChoice">Choix de la catégorie</label>
            <select name="category" class="form-control" id="categoryChoice">

                <?php foreach ($categories as $category) : ?>

                    <?php if ($category['id'] == $recipe['category_id']) : ?>
                        <option value="<?= $category['id']; ?>" selected><?= $category['name']; ?></option>
                    <?php elseif ($category['id'] == ATTENTE) : ?>
                        <?php continue; ?>
                    <?php else : ?>
                        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                    <?php endif; ?>

                <?php endforeach; ?>

            </select>
        </section>

        <section class="form-section">
            <label for="title">Titre de votre recette</label>
            <textarea name="title" class="form-control" id="title"><?= $recipe['title']; ?></textarea>
        </section>

        <section class="form-section">
            <label for="exampleFormControlTextarea1">Etape de réalisation de votre recette</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1"><?= $recipe['description']; ?></textarea>
        </section>

        <section class="form-section">
            <section class="show-recipe-section-img">

                <?php if (!empty($recipe['image'])) : ?>
                    <img src="/public/src/img/<?= $recipe['image']; ?>" alt="image qui représente">
                <?php else : ?>
                    <img src="https://via.placeholder.com/350x150" alt="image qui représente">
                <?php endif; ?>

            </section>
        </section>

        <section class="form-section">
            <p>Éditer cette image ?</p>
            <button type="button" class="btn yes">Oui</button>
            <button type="button" class="btn no">Non</button>
        </section>

        <section class="async_form">
        </section>

        <section class="form-section">
            <button type="submit" class="btn btn-success">Envoyez !</button>
        </section>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/async.js"></script>
<?php endif; ?>