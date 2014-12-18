<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ISIMA</title>
        <script src="./javascript/dropzone.js"></script>
        <link rel="stylesheet" type="text/css" href="css/dropzone.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/base.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/etat.css">
    </head>
    <body>
        <nav>
            <ul id="mainMenu">
                <li><a>Ajouter</a></li>
                <li><a>Modifier</a></li>
                <li><a>Supprimer</a></li>
                <li class="flotteDroite"><a>Déconexion</a></li>
            </ul>
        </nav>
        <div id="corp">

            <section id="centre">
                <form action="/file-upload" class="dropzone" id="my-awesome-dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div> 
                </form>
            </section>
        </div>
    </body>
</html>
