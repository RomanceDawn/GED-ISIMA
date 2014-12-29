<?php
//    header('HTTP/1.1 500 Internal Server Error');
//    header('Content-type: text/plain');
//    exit(var_dump($_FILES));
if (!empty($_FILES)) {
    include './Rapport.class.php';
    include './QueryManager.class.php';

    $date = NULL;
    $auteur = NULL;
    $mots_cles = NULL;

    $tempFile = $_FILES['file']['tmp_name'];          //3     
    $name_origin = $_FILES['file']['name'];
    //$extension=substr(strrchr($name_origin,'.'),1) ;
    $random_id_length = 15;


//generate a random id encrypt it and store it in $rnd_id 
    $rnd_id = crypt(uniqid(rand(), 1));
//to remove any slashes that might have come 
    $rnd_id = strip_tags(stripslashes($rnd_id));
//Removing any . or / and reversing the string 
    $rnd_id = str_replace(".", "", $rnd_id);
    $rnd_id = strrev(str_replace("/", "", $rnd_id));
//finally I take the first 10 characters from the $rnd_id 
    $rnd_id = substr($rnd_id, 0, $random_id_length);
    $name_server = $rnd_id;

    $targetPath = "../rapports/";  //4
    $targetFile = $targetPath . $name_server;  //5

    $temp = new Rapport($date, $name_origin, $mots_cles, $name_server, $auteur);
    QueryManager::insert($temp);
    move_uploaded_file($tempFile, $targetFile); //6   
}