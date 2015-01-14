<?php
session_start();
require_once('Rapport.class.php');

    include './QueryManager.class.php';
    $titre = $_POST['titre'];
    
    $rapports=QueryManager::search($titre);
  /*  $str=$rapports[0];
    $rapport=unserialize($str);
    echo $rapport->getNom_Origin();*/
   
    $_SESSION['rapports']=$rapports;
   header('Location: ../pages/resultatRecherche.php');
   


