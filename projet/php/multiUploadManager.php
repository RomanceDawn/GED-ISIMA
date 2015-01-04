<?php

//$allowed_types_files = array(
//    "application/pdf",
//    "application/vnd.oasis.opendocument.text",
//    "application/msword",
//    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
//    "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
//);
//
$allowed_files_extensions = array(
    "pdf",
    "doc",
    "docx",
    "odt",
);

if (!empty($_FILES)) {
    $name_origin = $_FILES['file']['name'];
    $extension = substr(strrchr($name_origin, '.'), 1);
    if (!in_array(strtolower($extension), $allowed_files_extensions)) {
   
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-type: text/plain');
        exit("Type de fichier non valide.");
    }
    include './Rapport.class.php';
    include './QueryManager.class.php';
    $date = NULL;
    $auteur = NULL;
    $mots_cles = NULL;
    //$random_id_length = 15;
    $tempFile = $_FILES['file']['tmp_name'];          //3     
    $name_origin = $_FILES['file']['name'];
    $extension = substr(strrchr($name_origin, '.'), 1);

//generate a random id encrypt it and store it in $rnd_id 
    $rnd_id = crypt(uniqid(rand(), 1));
    $rnd_id = strip_tags(stripslashes($rnd_id));
    $rnd_id = str_replace(".", "", $rnd_id);
    $rnd_id = strrev(str_replace("/", "", $rnd_id));
    //$rnd_id = substr($rnd_id, 0, $random_id_length);
    $name_server = $rnd_id;

    $targetPath = "../rapports/";  //4
    $targetFile = $targetPath . $name_server;  //5

    $temp = new Rapport($date, $name_origin, $mots_cles, $name_server, $auteur);
    $id = QueryManager::insert($temp);
    move_uploaded_file($tempFile, $targetFile); //6 
    echo $id;
    //echo "1"; //responsetext
} else {
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-type: text/plain');
    exit("Erreur lors du transfert de fichier.");
}