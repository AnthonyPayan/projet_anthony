<?php
include('../../layout.php');

if (empty($_GET)) {
    echo "<section class='container-info'>
            <p>Comment êtes-vous arrivez ici ?!</p>
            <a class'btn' href='/index.php'>Accueil</a>
        </section>";
} elseif ($_GET['error'] == 1) {
    echo "<section class='container-info'>
            <p>Désolé la recette n'existe pas</p>
            <a class='btn' href='/index.php'>Accueil</a>
        </section>";
} elseif ($_GET['error'] == 2) {
    echo "<section class='container-info'>
            <p>Déssolé pas d'id reçu</p>
            <a class='btn' href='/index.php'>Accueil</a>
        </section>";
} elseif ($_GET['error'] == 3) {
    echo "<section class='container-info'>
            <p>Déssolé vous n'êtes pas connecté</p>
            <a class='btn' href='Login.php'>Connexion</a>
        </section>";
} elseif ($_GET['error'] == 4) {
    echo "<section class='container-info'>
            <p>Désolé ce profil ne vous est pas accessible</p>
            <a class='btn' href='/index.php'>Accueil</a>
        </section>";
} elseif ($_GET['error'] == 5) {
    echo "<section class='container-info'>
            <p>Désolé cette recette ne vous est pas accessible</p>
            <a class='btn' href='/index.php'>Accueil</a>
        </section>";
} elseif ($_GET['error'] == 6) {
    echo "<section class='container-info'>
            <p>Désolé vous n'avez pas les droits pour accéder à cette page.</p>
            <a class='btn' href='/index.php'>Accueil</a>
        </section>";
} elseif ($_GET['error'] == 6) {
    echo "<section class='container-info'>
            <p>Cet utilisateur n'existe pas.</p>
            <a class='btn' href='/index.php'>Accueil</a>
        </section>";
} elseif ($_GET['error'] == 7) { //erreur login.php
    echo "<section class='container-info'>
            <p class='text-danger'>Mot de passe invalide</p>
            <a class='btn' href='login.php'>Réessayer</a>
        </section>";
} elseif ($_GET['error'] == 8) { //erreur login.php
    echo "<section class='container-info'>
            <p class='text-danger'>Ce pseudonyme n'éxiste pas</p>
            <a class='btn' href='login.php'>Réessayer</a>
        </section>";
} elseif ($_GET['error'] == 9) { //erreur login.php
    echo "<section class='container-info'>
            <p class='text-danger'>Tout les champs n'ont pas été remplis</p>
            <a class='btn' href='login.php'>Réessayer</a>
        </section>";
}
