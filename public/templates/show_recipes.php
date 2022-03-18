<?php
include('../../layout.php');

if ($_GET) {
	$category_id = $_GET['category_id'];
	$recipes = selectAllBy($pdo, 'recipes', 'category_id', $category_id);
	$category = selectOneBy($pdo, 'categories', 'id', $category_id);
} ?>
<section class="first-container flex-wrap">

	<?php foreach ($recipes as $recipe) : ?>
		<?php $recipe_id = $recipe['id']; ?>
		<?php $recipe_user_id = $recipe['user_id']; ?>
		<?php $user = selectTwoByFetch($pdo, 'nickname', 'avatar', 'users', 'id', $recipe_user_id); ?>
		<?php $recipe_date = showDate($recipe['date_recipe']);
		$count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
		$ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id); ?>

		<article class="container-article-show_recipes shadow effect-up">
			<a class="content-article" href="show_recipe.php?recipe_id=<?= $recipe_id; ?>">
				<section>

					<?php if (empty($recipe['image'])) : ?>
						<img src="https://via.placeholder.com/350x350" alt="image qui représente">
					<?php else : ?>
						<img src="/public/src/img/<?= $recipe['image']; ?>" alt="image qui représente">
					<?php endif; ?>

				</section>
				<section>
					<h2><?= $recipe['title']; ?></h2>
					<p class="p-detail">Posté par <?= $user['nickname']; ?></p>
					<p class="p-detail">Le <?= $recipe_date; ?></p>
					<p class="p-detail">Catégorie <?= $category['name']; ?></p>
				</section>
				<section class="show-recipe-ranked">
					<?php ranking($count['average']); ?>
					<span><?= $ranked_count['ranked_count']; ?><i class="far fa-comment"></i></span>
				</section>
			</a>
		</article>
	<?php endforeach; ?>
</section>