<?php require('../../libraries/services/functions.php');

$error = [];
if (!empty($_POST)) {

   if (empty($_POST['nickname'])) { //Champ pseudonyme 
      $error[] = 12;
      header("location: Error.php?error=" . $error[0] . "");
      exit();
   }

   if (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['nickname'])) {
      $error[] = 13;
      header("location: Error.php?error=" . $error[0] . ""); //Mauvais caractère(s)
      exit();
   }

   $sql = 'SELECT id FROM users WHERE nickname = ?';
   $query = $pdo->prepare($sql);

   $query->execute([htmlentities($_POST['nickname'])]);
   $user = $query->fetch();

   if ($user) { //Pseudo déjà utilisé
      $error[] = 14;
      header("location : Error.php?error=" . $error[0] . "");
      exit();
   }

   if (empty($_POST['password'])) { //Champ MDP recquis 
      $error[] = 15;
      header("location: Error.php?error=" . $error[0] . "");
      exit();
   }
   if (empty($_POST['password_confirm'])) {
      $error[] = 18;
      header("location: Error.php?error=" . $error[0] . ""); //Le MDP de confirmation est vide
      exit();
   }
   if ($_POST['password'] != $_POST['password_confirm']) {
      $error[] = 16;
      header("location: Error.php?error=" . $error[0] . ""); //Le MDP de confirmation ne correspond pas
      exit();
   }

   if (empty($error)) {
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
      exit();
   } else {
      $error[] = 17;
      header("location: Error.php?error=" . $error[0] . "");
   }
}
