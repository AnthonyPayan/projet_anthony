<?php
include('sql_requests.php');
include('avatar.php');
include('constants.php');


function getPdo()
{
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', '' . DB_USER . '', '' . DB_PWD . '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    return $pdo;
}


function sessionCheck()
{
    if (empty($_SESSION)) {
        echo "<p class='text-danger'> Session VISITEUR</p>";
    } elseif ($_SESSION['role'] == USERS) {
        echo '<p class="text-warning"> Session UTILISATEUR de : ' . ' ' . $_SESSION['user'] . '</p>';
    } elseif ($_SESSION['role'] == 2) {
        echo '<p class="text-success"> Session MODERATEUR de : ' . ' ' . $_SESSION['user'] . '</p>';
    } elseif ($_SESSION['role'] == ADMIN) {
        echo '<p class="text-info"> Session ADMINISTRATEUR de : ' . ' ' . $_SESSION['user'] . '</p>';
    }
}

function showDate($toStringDate)
{
    $timestamp = strtotime($toStringDate);
    return $date = date("d-m-Y", $timestamp);
}


function adminCheck()
{
    if (empty($_SESSION)) {
        header("location: ../../public/templates/error.php?error=3");
    } elseif ($_SESSION['role'] != ADMIN) {
        header("location: ../../public/templates/error.php?error=6");
    }
}


function ranking($rank)
{
    if ($rank == null) {
        $rank = 0;
    }

    for ($i = 0; $i <= 4; $i++) {

        if ($rank > $i) {
            echo '<i class="fas fa-star fastar"></i>';
        } else {
            echo '<i class="far fa-star farstar"></i>';
        }
    }
}

function rankingStack($rank)
{

    if ($rank == null) {
        $rank = 0;
    }

    for ($i = 0; $i <= 4; $i++) {

        if ($rank > $i) {
            $array[$i] = '<i class="fas fa-star fastar"></i>';
        } else {
            $array[$i] = '<i class="far fa-star farstar"></i>';
        }
    }
    return $array;
}
