<?php
include('../../layout.php');

if (isset($_GET)) : ?>

	<?php if ($_GET['recipe_id'] == FALSE) {
		header("location: ../../public/templates/error.php?error=2");
	}

	$recipe_id = $_GET['recipe_id'];
	$recipes = allDatas($pdo, $recipe_id);
	$count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
	$ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id);
	$date_recipe = showDate($recipes['date_recipe']); ?>


	<section class="section-show-recipe">

		<?php if ($recipes != false) : ?>
			<article class="article-show-recipe">
				<section class="show-recipe-section-img">
					<h2><?= $recipes['title']; ?></h2>

					<?php if (empty($recipes['image'])) : ?>
						<img src="https://via.placeholder.com/350x150" class="card-img-top" alt="Cette recette ne comporte pas d'image ceci est une image de remplacement">
					<?php else : ?>
						<img src="../src/img/<?= $recipes['image']; ?>" class="card-img-top" alt="<?= $recipes['title']; ?>">
					<?php endif; ?>

				</section>
				<section class="show-recipe-detail">
					<p class="p-detail">Posté par <?= $recipes['nickname']; ?></p>
					<p class="p-detail">Le <?= $date_recipe; ?></p>
					<p class="p-detail">Catégorie
						<a title="Voir les recette de la catégorie <?= $recipes['name']; ?>" href="show_recipes.php?category_id=<?= $recipes['category_id']; ?>">
							<?= $recipes['name']; ?>
						</a>
					</p>
				</section>

				<section class="show-recipe-ranked">

					<?php ranking($count['average']); ?>

					<a title="Voir les avis pour cette recette" href="#section-comments_link">

						<?php if ($ranked_count['ranked_count'] >= 1) : ?>
							<span>sur <?= $ranked_count['ranked_count']; ?> avis</span>
						<?php else : ?>
							<span>0 <i class="far fa-comment"></i></span>
						<?php endif; ?>

					</a>
				</section>
			</article>


			<section class="show-recipe-section-link flex flex-wrap">

				<?php if ($_SESSION) : ?>

					<a href="#add_comment_link" class="btn">Ajouter un commentaire</a>
				<?php endif; ?>

			</section>

			<section class="show-recipe-description" id="section-comments_link">
				<h3>Préparation :</h3>
				<p class="p-detail"> <?= $recipes['description']; ?></p>
			</section>

			<?php
			$comments = showCommentsUsers($pdo, $recipe_id);

			if (!empty($comments)) : ?>
				<section class="show-recipe-description section-comments">
					<h3>Commentaires :</h3>
					<?php foreach ($comments as $comment) : ?>
						<p class="p-detail"><?= $comment['nickname']; ?>
							<span> "<?= $comment['comment']; ?>"</span>
						</p>
						<p class="star_note">
							<?php ranking($comment['ranked']); ?>
						</p>
					<?php endforeach; ?>
				</section>
			<?php else :  ?>
				<section class="container-info">
					<p>Il n'y a pas de commentaire pour cette recette.</p>
					<p> Soit le premier à commenter la recette :</p>
					<p><?= $recipes['title']; ?></p>
					<a class="btn" href="/public/templates/add_comment.php?recipe_id=<?= $recipes['id']; ?>">Commenter</a>
				</section>
			<?php endif; ?>


			<?php if ($_SESSION) : ?>
				<form method="POST" action="../controller/AddComment.php" id="add_comment_link">

					<section class="form-section">
						<label for="comment">Votre commentaire...</label>
						<div class="form-floating mb-3">
							<input name="comment" type="text" class="form-control" id="comment" placeholder="J'adore cette recette...">
					</section>

					<section class="form-section">
						<label for="ranked">Attribuer une note sur 5</label>
						<select name="ranked" class="form-select" id="ranked">
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
						<button type="submit" class="btn btn-success">Envoyez</button>
					</section>
				</form>

				<?php if (!empty($_POST)) {
					$ranked = intval($_POST['ranked']);
					$comment = $_POST['comment'];
					$user_id = $_POST['user'];
					$recipe_id = intval($_POST['recipe_id']);

					insertComment($pdo, $comment, $ranked, $user_id, $recipe_id);
					header("location: /show_comments.php?id=$recipe_id");
					exit();
				}; ?>
			<?php endif; ?>
		<?php endif; ?>
	</section>

<?php endif; ?>
<?php include('../../layout_end.php'); ?>