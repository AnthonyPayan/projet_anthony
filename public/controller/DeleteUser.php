<?php
require('../../libraries/services/functions.php');
$pdo = getPdo();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    deleteById($pdo, 'users', 'id', $id);
    session_destroy();
    header('location: /index.php');
}
