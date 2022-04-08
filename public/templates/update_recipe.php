<form method="POST" action="../controller/UpdateRecipe.php" enctype="multipart/form-data">

    <input id="user_id" name="user_id" type="hidden" value="<?= $user_id; ?>">
    <input id="user_id" name="recipe_id" type="hidden" value="<?= $recipe_id; ?>">

    <section class="form-section">
        <label for="category">Choix de la catégorie</label>
        <select name="category" class="form-control" id="category">
            <?php foreach ($categoriesArray as $categoryArray => $number) : ?>
                <option value="<?= $number['category_id']; ?>" <?= $number['attribute']; ?>><?= $number['category_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </section>

    <section class="form-section">
        <label for="title">Titre de votre recette</label>
        <textarea name="title" class="form-control" id="title"><?= $recipe['title']; ?></textarea>
    </section>

    <section class="form-section">
        <label for="description">Etape de réalisation de votre recette</label>
        <textarea name="description" class="form-control" id="description"><?= $recipe['description']; ?></textarea>
    </section>

    <section class="form-section">
        <section class="show-recipe-section-img">
            <img src="<?= $imgSrcAlt["src"]; ?>" alt="<?= $imgSrcAlt["alt"]; ?>">
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