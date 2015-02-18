<?php
include("./header.php");

if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}
?>

<div class="container theme-showcase" role="main">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Upload simple</h3>
        </div>
        <div class="panel-body">

            <form class="form-horizontal" method="post" action="../php/simpleUploadManager.php" enctype="multipart/form-data" id="file-form">
                <fieldset><?php
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
                        <label class="col-md-4 control-label" for="file">Fichier</label>
                        <div class="col-md-4">
                            <input type="file" id="file" name="file" accept="application/pdf">
                            <span class="help-block">Format accepté : PDF</span> 
                            <button type="button" id="auto" class="btn btn-info btn-sm">Auto-Complétion</button>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="titre">Titre</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre du document">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="auteur">Auteur</label>
                        <div class="col-md-4">
                            <input type="text" name="auteur" class="form-control" id="auteur" placeholder="Auteur du document">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="date">Année</label>
                        <div class="col-md-4">
                            <select id="date" name="date" class="form-control">
                                <option value=""></option>
                                <?php
                                $tmp = intval(date('o'));
                                for ($index = $tmp; $index >= 1993; $index--) {
                                    echo '<option value="' . $index . '">' . $index . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="sujet">Sujet</label>
                        <div class="col-md-4">
                            <input type="text" name="sujet" class="form-control" id="sujet" placeholder="Sujet du document">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="motscles">Description</label>
                        <div class="col-md-4">
                            <textarea name="description" id="description" class="form-control vertic"  rows="2" placeholder="Description du fichier..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="motscles">Mots clés</label>
                        <div class="col-md-4">
                            <input type="text" name="motscles" class="form-control" id="motscles" placeholder="Mots clés du fichier...">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="texte">Texte du document</label>
                        <div class="col-md-4">                     
                            <textarea class="form-control" id="texte" name="texte" placeholder="Copiez collez ici tout le texte du document."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>

                </fieldset>
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
                        date.value = obj.date_creation;
                        motscles.value = obj.mots_clefs;
                        sujet.value = obj.sujet;

                    } else {
                        alert('Une erreur est survenue.\n Auto-complétion impossible.');
                        uploadButton.setAttribute("disabled", true);
                        uploadButton.className += " btn-danger"
                    }

                    uploadButton.innerHTML = 'Auto-Complétion';
                };
                xhr.send(formData);
                // The rest of the code will go here...

            }

        </script>
    </div>
</div>
<?php include("./footer.php"); ?>
