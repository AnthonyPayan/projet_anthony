<?php
include('layout.php');
$max_elements = 8;
if (empty($_GET['page'])) {
	$_GET['page'] = 1;
}
$recipes = selectPaginationJoin($pdo, 'recipes', $_GET['page'], $max_elements);
$nb_recipes = nbPages($pdo);
$pagination = ceil($nb_recipes['count_recipe'] / $max_elements);
if (!empty($recipes)) : ?>
	<section class="container flex-wrap">
		<?php foreach ($recipes as $recipe) : ?>
			<?php
			$recipe_id = $recipe['id'];
			$category = selectOneByFetch($pdo, 'category_id', 'recipes', 'id', $recipe_id);
			$category_id = $category['category_id'];
			$recipe_description = substr($recipe['description'], 0, 55);
			$date = showDate($recipe['date_recipe']);
			$count = roundAvgFetch($pdo, 'ranked', 'average', 'comments', 'recipe_id', $recipe_id);
			$ranked_count = countAsWhere($pdo, 'ranked', 'ranked_count', 'comments', 'recipe_id', $recipe_id);
			?>
			<article class="shadow effect-up">
				<a title="Afficher la recette" href="public/templates/show_recipe.php?recipe_id=<?= $recipe_id; ?>&category_id=<?= $category_id; ?>">
					<h4><?= substr($recipe['title'], 0, 20); ?></h4>
					<h5> de <?= $recipe['nickname']; ?></h5>
					<section class="relative">
						<?php if (empty($recipe['image'])) : ?>
							<img src="https://via.placeholder.com/350x350" alt="Cette recette ne comporte pas d'image ceci est une image de remplacement">
						<?php else : ?>
							<img src="/public/src/img/<?= $recipe['image']; ?>" alt="<?= $recipe['title']; ?>">
						<?php endif; ?>
						<p class="avatar"><?= $avatar[$recipe['avatar']]; ?></p>
					</section>
					<h6><?= $date; ?></h6>
					<p>
						<?php ranking($count['average']); ?>
						<span>sur <?= $ranked_count['ranked_count']; ?> avis</span>
					</p>
				</a>
			</article>
		<?php endforeach; ?>
	</section>
<?php else : ?>
	<section class="container-info">
		<p>Aucune recette n'a été trouvé !</p>
		<p>Prochainement vous trouverez les recettes ici</p>
		<a class="btn" href="/public/templates/add_recipe.php">Ajoutez votre recette</a>
	</section>
	<?php exit(); ?>
<?php endif; ?>
<section class="section-pagination">
	<?php for ($i = 1; $i <= $pagination; $i++) : ?>
		<a class="btn" href='__DIR__ /../index.php?page=<?= $i; ?>'><?= $i; ?></a>
	<?php endfor; ?>
</section>
<?php include('layout_end.php'); ?>