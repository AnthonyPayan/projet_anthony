<?php


function selectAll($pdo, $tableToSelect)
{
    $sql = "SELECT * FROM $tableToSelect";
    $query = $pdo->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}

function selectLast($pdo, $tableToSelect)
{
    $sql = "SELECT * FROM $tableToSelect ORDER BY date_recipe desc limit 3";
    $query = $pdo->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}

function selectOneBy($pdo, $tableToSelect, $where, $selectTo)
{
    $sql = "SELECT * FROM $tableToSelect WHERE $where = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$selectTo]);
    $data = $query->fetch();
    return $data;
}

function selectAllBy($pdo, $tableToSelect, $where, $selectTo)
{
    $sql = "SELECT * FROM $tableToSelect WHERE $where = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$selectTo]);
    $data = $query->fetchAll();
    return $data;
}
function selectOneByFetch($pdo, $select, $tableToSelect, $where, $selectTo)
{
    $sql = "SELECT $select FROM $tableToSelect WHERE $where = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$selectTo]);
    $data = $query->fetch();
    return $data;
}
function selectTwoByFetch($pdo, $select, $select2, $tableToSelect, $where, $selectTo)
{
    $sql = "SELECT $select, $select2 FROM $tableToSelect WHERE $where = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$selectTo]);
    $data = $query->fetch();
    return $data;
}

function selectOneByAll($pdo, $select, $tableToSelect, $where, $selectTo)
{
    $sql = "SELECT $select FROM $tableToSelect WHERE $where = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$selectTo]);
    $data = $query->fetchAll();
    return $data;
}

function selectAllByFetchAll($pdo, $select, $tableToSelect)
{
    $sql = "SELECT $select FROM $tableToSelect";
    $query = $pdo->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}


function selectByWaW($pdo, $tableToSelect, $firstWhere, $secondWhere, $firstSelectTo, $secondSelectTo)
{
    $sql = "SELECT * FROM $tableToSelect where $firstWhere = ? AND $secondWhere = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$firstSelectTo, $secondSelectTo]);
    $data = $query->fetchAll();
    return $data;
}



function deleteById($pdo, $tableToSelect, $where, $selectTo)
{
    $sql = "DELETE FROM $tableToSelect WHERE $where = $selectTo";
    $query = $pdo->prepare($sql);
    $query->execute();
}
function showCommentsUsers($pdo, $recipe_id)
{
    $sql = "SELECT comment, ranked, nickname FROM comments INNER JOIN users ON comments.user_id = users.id WHERE recipe_id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$recipe_id]);
    return $data = $query->fetchAll();
}


function showComments($pdo)
{
    $recipe_id = $_GET['recipe_id'];
    $sql = 'SELECT * FROM recipes INNER JOIN comments ON recipes.id = comments.recipe_id WHERE recipes.id = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$recipe_id]);
    $datas = $query->fetchAll();
    return $datas;
}

function allDatas($pdo, $recipe_id)
{
    $sql = 'SELECT recipes.id, title, description, image, date_recipe, recipes.user_id, category_id, name, comment, ranked, nickname FROM recipes
	INNER JOIN comments
	ON recipes.id = comments.recipe_id
	INNER JOIN users
	ON recipes.user_id = users.id
	INNER JOIN categories
	ON recipes.category_id = categories.id
	WHERE recipes.id = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$recipe_id]);
    return $data = $query->fetch();
}



function showCommentsById($pdo, $recipe_id)
{
    $sql = 'SELECT * FROM recipes INNER JOIN comments ON recipes.id = comments.recipe_id WHERE recipes.id = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$recipe_id]);
    $datas = $query->fetchAll();
    return $datas;
}
function selectAllJoin($pdo, $tableToSelect)
{
    $sql = "SELECT recipes.id, recipes.title, recipes.description, recipes.image, recipes.date_recipe, users.nickname, users.avatar, categories.name FROM $tableToSelect
    INNER JOIN categories ON category_id = categories.id
    INNER JOIN users ON user_id = users.id
    ORDER BY date_recipe
   ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}

function selectPagination($pdo, $tableToSelect, $page, $limit)
{
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM $tableToSelect ORDER BY date_recipe DESC LIMIT $limit OFFSET $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}

function selectPaginationJoin($pdo, $tableToSelect, $page, $limit)
{
    $offset = ($page - 1) * $limit;
    $sql = "SELECT recipes.id, recipes.title, recipes.description, recipes.image, recipes.date_recipe, users.nickname, users.avatar, categories.name FROM $tableToSelect
    INNER JOIN categories ON category_id = categories.id
    INNER JOIN users ON user_id = users.id
    ORDER BY date_recipe
    DESC LIMIT $limit OFFSET $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}
function searchById($pdo, $user_id)
{
    $sql = "SELECT nickname, role, avatar, registration_at FROM users WHERE id = $user_id";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $user_info = $query->fetch();
}


function countOneTable($pdo, $whyCount, $whatAs, $fromWhy)
{
    $sql = "SELECT count($whyCount) AS $whatAs FROM $fromWhy";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $data = $query->fetch();
}

function nbPages($pdo)
{
    $sql = 'SELECT count(id) AS count_recipe FROM recipes';
    $query = $pdo->prepare($sql);
    $query->execute();
    return $data = $query->fetch();
}

function countAsWhere($pdo, $whyCount, $whatAs, $fromWhy, $where, $selectTo)
{
    $sql = "SELECT count($whyCount) AS $whatAs FROM $fromWhy WHERE $where = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$selectTo]);
    return $data = $query->fetch();
}

function countWaWfetch($pdo, $count, $as, $from, $where, $where2, $select, $select2)
{
    $sql = "SELECT count($count) AS $as FROM $from WHERE $where = ? AND $where2 = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$select, $select2]);
    return $data = $query->fetch();
}


function roundAvgFetch($pdo, $round, $as, $from, $where, $select)
{
    $sql = "SELECT round(AVG($round)) AS $as FROM $from WHERE $where = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$select]);
    return $data = $query->fetch();
}
function insertComment($pdo, $comment, $ranked, $user_id, $recipe_id)
{
    $sql = "INSERT INTO comments (comment, ranked, user_id, recipe_id)
								VALUES (?, ?, ?, ?)";
    $query = $pdo->prepare($sql);
    $query->execute([$comment, $ranked, $user_id, $recipe_id]);
}
