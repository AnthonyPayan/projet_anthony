<?php require('../../libraries/services/functions.php');
$pdo = getPdo();


if (!empty($_POST)) {

   $errors = [];

   if (empty($_POST['nickname']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nickname'])) {
      $errors['nickname'] = 'Le pseudo ne peut contenir que les caractères suivant : a-z A-Z 0-9 et _';
   } else {
      $sql = 'SELECT id FROM users WHERE nickname = ?';
      $query = $pdo->prepare($sql);

      $query->execute([htmlentities($_POST['nickname'])]);
      $user = $query->fetch();
      if ($user) {
         $errors['nickname'] = 'Ce pseudo est déjà pris.';
      }
   }

   if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
      $errors['password'] = 'Les mot de passe ne correspondent pas.';
   }

   if (empty($errors)) {

      $avatar_num = rand(1, 26);
      $password = $_POST['password'];
      $hashed_password = password_hash($password, PASSWORD_BCRYPT);
      $sql = 'INSERT INTO users(
			nickname,
			password,
			avatar
		) VALUES(?, ?, ?)';
      $query = $pdo->prepare($sql);
      $query->execute([
         $_POST['nickname'],
         $hashed_password,
         $avatar_num
      ]);
      session_start();
      $user_id = $pdo->lastInsertId();

      $_SESSION['id'] = $user_id;
      $_SESSION['user'] = $_POST['nickname'];
      $_SESSION['role'] = 3;
      $_SESSION['avatar'] = $avatar_num;
      header("location: ../../index.php");
   }
}

if (!empty($errors)) : ?>

   <section class="danger-section">

      <h4>Le formulaire n'a pas été rempli correctement</h4>
      <ul>
         <?php foreach ($errors as $error) : ?>
            <li><?= $error; ?></li>
            <br>
         <?php endforeach; ?>
      </ul>

      <a class="btn" href="/public/templates/registration.php">Nouvel tentative</a>
      <a class="btn" href="/index.php">Retour accueil</a>

   </section>




<?php endif; ?>