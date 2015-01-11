<?php
session_start();
if (empty($_SESSION['login'])) {
    exit(0);
}

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
//    "doc",
//    "docx",
//    "odt",
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
    $date_creation = NULL;
    $date_modification = NULL;
    $sujet = NULL;
    $description = NULL;
    $auteur = NULL;
    $titre = NULL;
    $mots_clefs = NULL;

    $ajouteur = $_SESSION['login'];
    $tempFile = $_FILES['file']['tmp_name'];
    $nom_origin = $_FILES['file']['name'];
    $extension = substr(strrchr($name_origin, '.'), 1);

//generate a random id encrypt it and store it in $rnd_id
    $random_id_length = 20;
    $rnd_id = crypt(uniqid(rand(), 1));
    $rnd_id = strip_tags(stripslashes($rnd_id));
    $rnd_id = str_replace(".", "", $rnd_id);
    $rnd_id = strrev(str_replace("/", "", $rnd_id));
    $rnd_id = substr($rnd_id, 0, $random_id_length);
    $nom_server = $rnd_id;

    $targetPath = "../rapports/";
    $targetFile = $targetPath . $nom_server;

    move_uploaded_file($tempFile, $targetFile);

    try {
        require '../parser/vendor/autoload.php';
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($targetFile);
        $details = $pdf->getDetails();
        foreach ($details as $property => $value) {
            if (is_array($value)) {
                $value = implode(', ', $value);
            }
            //echo $property . ' => ' . utf8_encode($value) . "\n<br>";
        }
        $temp = new Rapport($description , $titre , $sujet , $date_creation , $date_modification , $nom_origin , $mots_clefs , $nom_server , $auteur , $ajouteur);
        $id = QueryManager::insert($temp);
        echo $id;
    } catch (Exception $e) {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-type: text/plain');
        unlink($targetFile);
        exit('FICHIER PDF INVALIDE : ' . $e->getMessage());
    }
} else {
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-type: text/plain');
    exit("Erreur lors du transfert de fichier.");
}