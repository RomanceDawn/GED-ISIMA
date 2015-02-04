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
    if(count($rapports)>1)
    {
        $_SESSION['rapports']=$rapports;
        header('Location: ../pages/resultatRecherche.php');
    }
    else
    {

        header('HTTP/1.1 500 Internal Server Error');
        header('Content-type: text/plain');
        header("Location: ../pages/recherche.php?erreur=1");
         
    }
   


?>