<?php
include('../../layout.php');

if (isset($_SESSION['role'])) {
    $user_id = $_SESSION['id'];
    $categories = selectAll($pdo, 'categories');
} else {
    header("location: error.php?error=3");
} ?>


<form method="POST" action="../controller/AddRecipe.php" enctype="multipart/form-data">


    <input id="user_id" name="user_id" type="hidden" value="<?= $user_id; ?>">


    <section class="form-section">
        <label for="categoryChoice">Choix de la catégorie</label>
        <select name="category" class="form-control" id="categoryChoice">
            <?php $only_one_category = countOneTable($pdo, 'id', 'count_category', 'categories');
            if ($only_one_category['count_category'] > 1) {
                foreach ($categories as $category) {
                    if ($category['id'] != ATTENTE) {
                        echo '<option value=' . $category['id'] . '>' . $category['name'] . '</option>';
                    }
                }
            } else {
                foreach ($categories as $category) {
                    echo '<option value=' . $category['id'] . '>' . $category['name'] . '</option>';
                }
            } ?>
        </select>
    </section>


    <?php $only_one_category = countOneTable($pdo, 'id', 'id_category', 'categories'); ?>


    <?php if ($only_one_category['id_category'] == 1) : ?>
        <section class="form-section">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Votre recette est automatiquement placé dans la catégorie "Attente", un méssage avec un lien vous sera envoyé quand d'autres catégories seront disponible</strong>
        </section>
    <?php endif; ?>

    <section class="form-section">
        <label class="label_title">Titre de votre recette</label>
        <input type="text" name="title" class="form_textarea_title" rows="1" placeholder="Titre de votre recette"></input>
    </section>


    <section class="form-section">
        <label class="label_description">Etape de réalisation de votre recette</label>
        <input name="description" class="form_textarea_description" placeholder="Etape de réalisation de votre recette"></input>
    </section>


    <section class="form-section">
        <label for="formFile" class="form-label zoom"><i class="fas fa-paperclip"></i><span>Ajouter une image</span></label>
        <input class="file_input" type="file" id="formFile" name="image">
    </section>


    <section class="form-section">
        <button type="submit" class="btn">Envoyez</button>
    </section>

</form>
<?php include("../../layout_end.php"); ?>