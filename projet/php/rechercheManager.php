<?php
session_start();
require_once('Rapport.class.php');
if (!empty($_POST['titre'])) {
    include './QueryManager.class.php';
    $titre = $_POST['titre'];
    
    $rapports=QueryManager::search($titre);
  /*  $str=$rapports[0];
    $rapport=unserialize($str);
    echo $rapport->getNom_Origin();*/
   
    $_SESSION['rapports']=$rapports;
   header('Location: ../pages/resultatRecherche.php');
   
} else {
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-type: text/plain');
    exit("Erreur lors du transfert de fichier.");
}


