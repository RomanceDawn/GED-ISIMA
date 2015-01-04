<?php include("./header.php"); ?>
 <div id="corp">
            <section id="centre">
                <form method="post" action="../php/rechercheManager.php" enctype="multipart/form-data">
                
           
                <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
                <input type="text" name="titre" value="Titre du fichier" id="titre" /><br />
                
                <input type="submit" name="submit" value="Rechercher" />
</form>
            </section>
        </div>
<?php include("./footer.php"); ?>