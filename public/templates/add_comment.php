<?php
include('../../layout.php');


if (!isset($_SESSION['role'])) {
    header("location: error.php?error=3");
}


if (!isset($_GET['recipe_id'])) {
    header("location: error.php?error=2");
} else {
    $recipe_id = $_GET['recipe_id'];
    $recipe_check = selectOneByFetch($pdo, 'id', 'recipes', 'id', $recipe_id);
}


if ($recipe_check == false) {
    header("location: error.php?error=1");
} ?>


<form method="POST" action="../controller/AddComment.php">


    <section class="form-section">
        <label for="floatingInput">Votre commentaire...</label>
        <input name="comment" type="text" class="form-control" id="floatingInput" placeholder="J'adore cette recette...">
    </section>


    <section class="form-section">
        <label for="ranked-choice">Attribuer une note sur 5</label>
        <select name="ranked" class="form-control" id="ranked-choice">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </section>


    <input name="user" type="hidden" value="<?= $_SESSION['id']; ?>">


    <input name="recipe_id" type="hidden" value="<?= $recipe_id; ?>">


    <section class="form-section">
        <button type="submit" class="btn">Envoyez</button>
    </section>
</form>