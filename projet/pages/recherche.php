<?php include("./headerRecherche.php"); ?>
<div id="corp">
    <section id="centre">
        <form method="post" action="../php/rechercheManager.php" enctype="multipart/form-data">


            <label for="titre">Terme à rechercher :</label><br />
            <input type="text" name="titre" value="" id="titre" /><br />

            <input type="submit" name="submit" value="Rechercher" />
        </form>
    </section>
</div>
<?php include("./footer.php"); ?>