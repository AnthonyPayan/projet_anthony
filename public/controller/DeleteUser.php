<?php
require('../../libraries/services/functions.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    deleteById($pdo, 'users', 'id', $id);
    session_start();
    session_destroy();

    header('location: /index.php');
    exit();
}
