<?php
include("./header.php");

if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}
?>

 <div class="container theme-showcase" role="main">
      <div class="page-header">
         <h1>Upload simple</h1>
         
     </div>
        <form method="post" action="../php/simpleUploadManager.php" enctype="multipart/form-data" id="file-form">
            <?php
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
            ?>

            <div class="form-group">
                <label for="file">Fichier</label>
                <input type="file" id="file" name="file" accept="application/pdf">
                <p class="help-block">Format accepté : PDF </p>
            </div>
            <button type="button" id="auto" class="btn btn-info btn-sm">Auto-Complétion</button>

            <div class="form-group">
                <label for="titre"><br>Titre</label>
                <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre du document">
            </div>

            <div class="form-group">
                <label for="auteur">Auteur</label>
                <input type="text" name="auteur" class="form-control" id="auteur" placeholder="Auteur du document">
            </div>
            <div class="form-group">
                <label for="date">Année</label>
                <input type="text" name="date" class="form-control" id="date" placeholder="Exemple : 2015">
            </div>
            <div class="form-group">
                <label for="sujet">Sujet</label>
                <input type="text" name="sujet" class="form-control" id="sujet" placeholder="Sujet du document">
            </div>
            <div class="form-group">
                <label for="motscles">Description</label>
                <textarea name="description" id="description" class="form-control vertic"  rows="2" placeholder="Description du fichier..."></textarea>
            </div>
            <div class="form-group">
                <label for="motscles">Mots clés</label>
                <input type="text" name="motscles" class="form-control" id="motscles" placeholder="Mots clés du fichier...">
            </div>
            <button type="submit" class="btn btn-default">Envoyer</button>
        </form>

</div>

<script type="text/javascript">

    var form = document.getElementById('file-form');
    var fileSelect = document.getElementById('file');
    var uploadButton = document.getElementById('auto');

    uploadButton.onclick = function (event) {
        var files = fileSelect.files;
        if (files.length === 0)
        {
            alert("Aucune fichier selectionner");
            return;
        }
        uploadButton.innerHTML = 'Patientez...';
        event.preventDefault();

        var formData = new FormData();
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            formData.append('file', file, file.name);
        }
        try
        {
            var xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e)
        {
            var xhr = new XMLHttpRequest();
        }

        // Update button text.

        xhr.open('POST', '../php/autoCompletionManager.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                //document.getElementById('centre').innerHTML = xhr.responseText;
                var obj = JSON.parse(xhr.responseText);
                var titre = document.getElementById('titre');
                var auteur = document.getElementById('auteur');
                var date = document.getElementById('date');
                var motscles = document.getElementById('motscles');
                var sujet = document.getElementById('sujet');
                titre.value = obj.titre;
                auteur.value = obj.auteur;
                date.value=obj.date_creation;
                motscles.value = obj.mots_clefs;
                sujet.value = obj.sujet;

            } else {
                alert('Une erreur est survenue.\n Auto-complétion impossible.');
                uploadButton.setAttribute("disabled",true);
                uploadButton.className += " btn-danger"
            }

            uploadButton.innerHTML = 'Auto-Complétion';
        };
        xhr.send(formData);
        // The rest of the code will go here...

    }

</script>

<?php include("./footer.php"); ?>
