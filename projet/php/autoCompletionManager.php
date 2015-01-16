<?php

session_start();
if (empty($_SESSION['login'])) {
    exit(0);
}


$allowed_files_extensions = array(
    "pdf",
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
//    $date_creation = NULL;
//    $date_modification = NULL;
    $sujet = NULL;
//    $description = NULL;
    $auteur = NULL;
    $titre = NULL;
    $mots_clefs = NULL;

//    $ajouteur = $_SESSION['login'];
    $tempFile = $_FILES['file']['tmp_name'];
    $nom_origin = $_FILES['file']['name'];
//    $extension = substr(strrchr($name_origin, '.'), 1);

//generate a random id encrypt it and store it in $rnd_id
    $random_id_length = 20;
    $rnd_id = crypt(uniqid(rand(), 1));
    $rnd_id = strip_tags(stripslashes($rnd_id));
    $rnd_id = str_replace(".", "", $rnd_id);
    $rnd_id = strrev(str_replace("/", "", $rnd_id));
    $rnd_id = substr($rnd_id, 0, $random_id_length);
    $nom_server = $rnd_id;

    $targetPath = "../tmp/";
    $targetFile = $targetPath . $nom_server;

    move_uploaded_file($tempFile, $targetFile);

    try {
        include '../parser/parser-metadata/pdf.php';
        $handle = fopen($targetFile, 'rb');
        $pdf = new PdfFileReader($handle);
        foreach ($pdf->get_document_info()->data as $property => $value) {
            if (is_array($value)) {
                $value = implode(', ', $value);
            } else {
                $value = utf8_encode($value);
            }
            switch ($property) {
                case 'title':
                    $titre = $value;
                    break;
                case 'author':
                    $auteur = $value;
                    break;
                case 'keywords':
                    $mots_clefs = $value;
                    break;
                case 'subject':
                    $sujet = $value;
                    break;
//                case 'creation_date':
//                    $timestamp = strtotime(substr($value, 2, 8));
//                    $date_creation = date('Y-m-d', $timestamp);
//                    break;
//                case 'mod_date':
//                    $timestamp = strtotime(substr($value, 2, 8));
//                    $date_modification = date('Y-m-d', $timestamp);
//                    break;
            }
        }
        $data = array(
            "titre" => $titre,
            "auteur" => $auteur,
            "mots_clefs" => $mots_clefs,
            "sujet" =>$sujet
        );
        fclose($handle);
        unlink($targetFile);
        echo json_encode($data, JSON_PRETTY_PRINT);

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