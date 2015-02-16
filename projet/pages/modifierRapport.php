<?php
include("./header.php");

if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}

if(isset($_SESSION['rapport']) && !empty($_SESSION['rapport']))
{
     require_once '../php/Rapport.class.php';
    $str_rapport=$_SESSION['rapport'];
    $rapport=unserialize($str_rapport);

}
echo"
 <div class=\"container theme-showcase\" role=\"main\">
        <form method=\"post\" action=\"../php/simpleUploadManager.php\" enctype=\"multipart/form-data\" id=\"file-form\">";
            if (isset($_GET['erreur'])) {
                switch ($_GET['erreur']) {
                    case 1:
                        echo '<div class="alert alert-danger">
                        <strong>Erreur!</strong> Chargement du fichier.
                      </div>';
                        break;
                    case 2:
                        echo '<div class="alert alert-danger">
                        <strong>Erreur!</strong> Format fichier.
                      </div>';
                        break;
                }
            }
            if (isset($_GET['success'])) {
                echo '<div class="alert alert-success">
                        <strong>OK!</strong> Envoi du fichier réussie.
                      </div>';
            }
echo"
            <div class=\"form-group\">
                <label for=\"file\">Fichier</label>
                <input type=\"file\" id=\"file\" name=\"file\" accept=\"application/pdf\">
                <p class=\"help-block\">Format accepté : PDF </p>
            </div>
            <div class=\"form-group\">
                <label for=\"titre\"><br>Titre</label>
                <input type=\"text\" class=\"form-control\" name=\"titre\" value=\"".$rapport->getTitre()."\" id=\"titre\" placeholder=\"Titre du document\">
            </div>

            <div class=\"form-group\">
                <label for=\"auteur\">Auteur</label>
                <input type=\"text\" name=\"auteur\" class=\"form-control\" id=\"auteur\" value=\"".$rapport->getAuteur()."\" placeholder=\"Auteur du document\">
            </div>
            <div class=\"form-group\">
                <label for=\"date\">Année</label>
                <input type=\"text\" name=\"date\" class=\"form-control\" id=\"date\" value=\"".$rapport->getAnnee()."\" placeholder=\"Exemple : 2015\">
            </div>
            <div class=\"form-group\">
                <label for=\"sujet\">Sujet</label>
                <input type=\"text\" name=\"sujet\" class=\"form-control\" value=\"".$rapport->getSujet()."\" id=\"sujet\" placeholder=\"Sujet du document\">
            </div>
            <div class=\"form-group\">
                <label for=\"motscles\">Description</label>
                <textarea name=\"description\" id=\"description\" class=\"form-control vertic\" value=\"".$rapport->getDescription()."\" rows=\"2\" placeholder=\"Description du fichier...\"></textarea>
            </div>
            <div class=\"form-group\">
                <label for=\"motscles\">Mots clés</label>
                <input type=\"text\" name=\"motscles\" class=\"form-control\" value=\"".$rapport->getmotsClefs()."\" id=\"motscles\" placeholder=\"Mots clés du fichier...\">
            </div>
            <button type=\"submit\" class=\"btn btn-default\">Envoyer</button>
        </form>

</div>";
?>


<?php include("./footer.php"); ?>
