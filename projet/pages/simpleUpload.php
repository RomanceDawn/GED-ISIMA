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
                <p class="help-block">Format accepté : PDF </p>
            </div>
            <button type="button" class="btn btn-info btn-sm">Auto-Complétion</button>

            <div class="form-group">
                <label for="Titre"><br/>Titre</label>
                <input type="text" class="form-control" id="Titre" placeholder="Titre du document">
            </div>

            <div class="form-group">
                <label for="auteur">Auteur</label>
                <input type="text" name="auteur"class="form-control" id="auteur" placeholder="Auteur du document">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" id="date" placeholder="Date de parution">
            </div>
            <div class="form-group">
                <label for="motscles">Description</label>
                <textarea name="description" id="description" name="description"  class="form-control" rows="2" placeholder="Description du fichier..."></textarea>
            </div>
            <div class="form-group">
                <label for="motscles">Mots clés</label>
                <input type="text" name="motscles" class="form-control" id="motscles" placeholder="Mots clés du fichier...">
            </div>
            <button type="submit" class="btn btn-default">Envoyer</button>
        </form>

    </section>
</div>

<?php include("./footer.php"); ?>
