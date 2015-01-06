<!DOCTYPE html>
<?php
 session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ISIRapport</title>
        <script src="../javascript/dropzone.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/dropzone.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/base.css">
        <link rel="stylesheet" type="text/css" href="../css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../css/etat.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    </head>
    <body>
        <nav>
            <ul id="mainMenu">
                <li><a href="index.php"><img src="../images/home.png" alt="Index" /></a></li>
                <li><a href="simpleUpload.php">Upload Simple</a></li>
                <li><a href="multiUpload.php">Upload Multiple</a></li>
                <li><a>Modifier fichier</a></li>
                <?php 
                if(!empty($_SESSION['login']))
                {
                  echo "<li class=\"flotteDroite\"><a href=\"../php/deconnexionManager.php\">Déconnexion</a></li>  ";
                  
                }
                else
                {
                    echo "<li class=\"flotteDroite\"><a href=\"connexion.php\">Connexion</a></li>  ";
                }
                
                        
                ?>
            </ul>
        </nav>