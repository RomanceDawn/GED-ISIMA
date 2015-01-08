<?php

include("./header.php");


if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}

echo'
<div id="corp">
    <section id="centre"> ';



echo'
    <script src="../javascript/customDropzone.js"></script>
        <form action="../php/multiUploadManager.php" class="dropzone" id="my-awesome-dropzone">
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div> 
        </form>



';



echo'    </section>
</div>';
include("./footer.php");
?>