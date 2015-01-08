<?php
include("./header.php");

if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}
?>

<div id="corp">
    <section id="centre">
        <form method="post" action="simpleUpload.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Fichier</label>
                <input type="file" id="file" accept="application/pdf">
                <p class="help-block">Fichiers PDF </p>
            </div>
            <div class="form-group">
                <label for="Titre">Titre</label>
                <input type="text" class="form-control" id="Titre" placeholder="Titre du document">
            </div>

            <div class="form-group">
                <label for="Auteur">Auteur</label>
                <input type="text" class="form-control" id="Auteur" placeholder="Auteur du document">
            </div>
            <div class="form-group">
                <label for="annee">Année</label>
                <input type="date" name="annee" class="form-control" id="annee" placeholder="Année de parution">
            </div>
            <div class="form-group">
                <label for="motscles">Mots clés</label>
                <textarea name="motscles" id="motscles"  class="form-control" rows="3"></textarea>
            </div>
            
        </form>

    </section>
</div>

<?php include("./footer.php"); ?>
