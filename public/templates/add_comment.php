<form method="POST" action="../controller/AddComment.php">

    <section class="form-section">
        <label for="comment">Votre commentaire...</label>
        <input name="comment" type="text" class="form-control" id="comment" placeholder="J'adore cette recette...">
    </section>

    <section class="form-section">
        <label for="ranked">Attribuer une note sur 5</label>
        <select name="ranked" class="form-control" id="ranked">
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