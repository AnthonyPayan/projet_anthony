<section class="section-show-recipe">

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
				<a title="Voir les recette de la catégorie <?= $recipes['name']; ?>" href="../controller/ShowRecipes.php?category_id=<?= $recipes['category_id']; ?>">
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
			<a href="../controller/NewComment.php?recipe_id=<?= $recipe_id; ?>" class="btn">Ajouter un commentaire</a>
		<?php endif; ?>

	</section>

	<section class="show-recipe-description" id="section-comments_link">
		<h3>Préparation :</h3>
		<p class="p-detail"> <?= $recipes['description']; ?></p>
	</section>
	<?php if (!empty($comments)) : ?>
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
			<a class="btn" href="/public/templates/add_comment.php?recipe_id=<?= $recipes['id']; ?>">Commenter</a>
		</section>
	<?php endif; ?>

</section>

<?php include('../../layout_end.php'); ?>