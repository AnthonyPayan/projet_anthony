<section class="first-container flex-wrap">

	<?php foreach ($datas as $data) : ?>

		<article class="container-article-show_recipes shadow effect-up">
			<a title="Afficher la recette" class="content-article" href="../controller/ShowRecipe.php?recipe_id=<?= $data['recipe_id']; ?>">
				<section>
					<img src="<?= $data['srcImg']; ?>" alt="<?= $data['altImg']; ?>">
				</section>
				<section>
					<h2><?= $data['recipe_title']; ?></h2>
					<p class="p-detail">Posté par <?= $data['author']; ?></p>
					<p class="p-detail">Le <?= $data['date']; ?></p>
					<p class="p-detail">Catégorie <?= $data['category']; ?></p>
				</section>
				<section class="show-recipe-ranked">
					<?php ranking($data['rank']); ?>
					<span><?= $data['ranked_count']; ?><i class="far fa-comment"></i></span>
				</section>
			</a>
		</article>

	<?php endforeach; ?>

</section>