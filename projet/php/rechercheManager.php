<?php
session_start();
require_once('Rapport.class.php');

    include './QueryManager.class.php';
    $motsClefs = $_POST['motsClefs'];
    $annee=$_POST['annee'];
    $titre = $_POST['titre'];
    $auteur=$_POST['auteur'];
    $sujet=$_POST['sujet'];
    $description=$_POST['description'];
    $rapports=QueryManager::search($motsClefs,$annee,$auteur,$titre,$sujet,$description);
  /*  $str=$rapports[0];
    $rapport=unserialize($str);
    echo $rapport->getNom_Origin();*/
   
    $_SESSION['rapports']=$rapports;
    header('Location: ../pages/resultatRecherche.php');
   


