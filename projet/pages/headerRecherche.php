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
        <script>
            var Dropzone = require("enyo-dropzone");
            Dropzone.autoDiscover = false;
        </script>


    </head>
    <body>
        <nav>
            <ul id="mainMenu">
                <li><a href="recherche.php"><img src="../images/home.png" alt="Index" /></a></li>
                <li><a href="recherche.php">Recherche Simple</a></li>
                <li><a href="rechercheAvancee.php">Recherche Avancée</a></li>   
            </ul>
        </nav>