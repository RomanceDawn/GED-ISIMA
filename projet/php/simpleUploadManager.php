<?php

session_start();
if (empty($_SESSION['login'])) {
    exit(0);
}


$allowed_files_extensions = array(
    "pdf",
);

if (!empty($_FILES) && !empty($_POST)) {
    $name_origin = $_FILES['file']['name'];
    $extension = substr(strrchr($name_origin, '.'), 1);
    if (!in_array(strtolower($extension), $allowed_files_extensions)) {

        header('HTTP/1.1 500 Internal Server Error');
        header('Content-type: text/plain');
        header("Location: ../pages/simpleUpload.php?erreur=2");
        exit("Type de fichier non valide.");
    }
    include './Rapport.class.php';
    include './QueryManager.class.php';
    $date_creation = NULL;
    $date_modification = NULL;
    $sujet = $_POST['sujet'];
    $description = $_POST['description'];
    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
    $mots_clefs = $_POST['motscles'];

    $ajouteur = $_SESSION['login'];
    $tempFile = $_FILES['file']['tmp_name'];
    $nom_origin = $_FILES['file']['name'];
    $extension = substr(strrchr($name_origin, '.'), 1);

//generate a random id encrypt it and store it in $rnd_id
//    $random_id_length = 20;
//    $rnd_id = crypt(uniqid(rand(), 1));
//    $rnd_id = strip_tags(stripslashes($rnd_id));
//    $rnd_id = str_replace(".", "", $rnd_id);
//    $rnd_id = strrev(str_replace("/", "", $rnd_id));
//    $rnd_id = substr($rnd_id, 0, $random_id_length);
//    $nom_server = $rnd_id;
    $nom_server = uniqid();

    $targetPath = "../rapports/";
    $targetFile = $targetPath . $nom_server;

    move_uploaded_file($tempFile, $targetFile);

    try {
        include '../parser/parser-metadata/pdf.php';
        $handle = fopen($targetFile, 'rb');
        $pdf = new PdfFileReader($handle);
        foreach ($pdf->get_document_info()->data as $property => $value) {
//            if (is_array($value)) {
//                $value = implode(', ', $value);
//            } else {
//                $value = utf8_encode($value);
//            }
            switch ($property) {
//                case 'title':
//                    $titre = $value;
//                    break;
//                case 'author':
//                    $auteur = $value;
//                    break;
//                case 'keywords':
//                    $mots_clefs = $value;
//                    break;
//                case 'subject':
//                    $sujet = $value;
//                    break;
                case 'creation_date':
                    $timestamp = strtotime(substr($value, 2, 8));
                    $date_creation = date('Y-m-d', $timestamp);
                    break;
                case 'mod_date':
                    $timestamp = strtotime(substr($value, 2, 8));
                    $date_modification = date('Y-m-d', $timestamp);
                    break;
            }
        }

        fclose($handle);
        include '../parser/parser-texte/Parser.class.php';
        $texte = PdfParser::parseFile($targetFile);
        $texte = iconv('UTF-8', 'UTF-8//IGNORE', $texte);
        $temp = new Rapport($description, $titre, $sujet, $date_creation, $date_modification, $nom_origin, $mots_clefs, $nom_server, $auteur, $ajouteur, $texte);
        $id = QueryManager::insert($temp);
        //echo $id;
        header("Location: ../pages/simpleUpload.php?success=1");
    } catch (Exception $e) {
        header('HTTP/1.1 500 Internal Server Error');
        header('Content-type: text/plain');
        unlink($targetFile);
        header("Location: ../pages/simpleUpload.php?erreur=2");
        exit('FICHIER PDF INVALIDE : ' . $e->getMessage());
    }
} else {
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-type: text/plain');
    header("Location: ../pages/simpleUpload.php?erreur=1");
    exit("Erreur lors du transfert de fichier.");
}