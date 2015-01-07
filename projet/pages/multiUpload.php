<?php include("./header.php");


echo'
<div id="corp">
    <section id="centre"> ';


if(!empty($_SESSION['login']))
{
    echo'
    <script src="../javascript/customDropzone.js"></script>
        <form action="../php/multiUploadManager.php" class="dropzone" id="my-awesome-dropzone">
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div> 
        </form>



';
}


echo'    </section>
</div>';
include("./footer.php");

?>