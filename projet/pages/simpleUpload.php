<?php include("./header.php"); 

echo '
 <div id="corp">
            <section id="centre">';


if(!empty($_SESSION['login']))
{
    echo'
                    <form method="post" action="simpleUpload.php" enctype="multipart/form-data">

                    <label for="mon_fichier">Fichier (tous formats | max. 1 Mo) :</label><br />
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                    <input type="file" name="mon_fichier" id="mon_fichier" /><br />
                    <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
                    <input type="text" name="titre" value="Titre du fichier" id="titre" /><br />
                    <label for="description">Description de votre fichier (max. 255 caractères) :</label><br />
                    <textarea name="description" id="description"></textarea><br />
                    <input type="submit" name="submit" value="Envoyer" />
    </form>
    ';

}
echo'
            </section>
        </div>
        '; 
         
include("./footer.php"); ?>
