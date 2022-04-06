<form method="POST" action="../controller/AddRecipe.php" enctype="multipart/form-data">

    <input id="user_id" name="user_id" type="hidden" value="<?= $user_id; ?>">

    <section class="form-section">
        <label for="category">Choix de la catégorie</label>

        <select name="category" class="form-control" id="category">
            <?php foreach ($cats as $cat => $number) : ?>
                <option value="<?= $number['category_id']; ?>"><?= $number['category_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </section>

    <section class="form-section">
        <label for="title" class="label_title">Titre de votre recette</label>
        <input type="text" name="title" class="form_textarea_title" rows="1" placeholder="Titre de votre recette">
    </section>


    <section class="form-section">
        <label flor="description" class="label_description">Etape de réalisation de votre recette</label>
        <input name="description" class="form_textarea_description" placeholder="Etape de réalisation de votre recette">
    </section>


    <section class="form-section">
        <label for="image" class="form-label zoom"><i class="fas fa-paperclip"></i><span>Ajouter une image</span></label>
        <input class="file_input" type="file" id="image" name="image">
    </section>


    <section class="form-section">
        <button type="submit" class="btn">Envoyez</button>
    </section>

</form>
<?php include("../../layout_end.php"); ?>