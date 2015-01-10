<?php

if (!empty($_POST['titre'])) {
    include './QueryManager.class.php';
    $titre = $_POST['titre'];
    echo $titre;
    QueryManager::search($titre);
} else {
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-type: text/plain');
    exit("Erreur lors du transfert de fichier.");
}


