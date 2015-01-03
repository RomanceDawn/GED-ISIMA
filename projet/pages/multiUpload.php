<?php include("./header.php"); ?>
<div id="corp">
    <section id="centre">        
        <script src="../javascript/customDropzone.js"></script>
        <form action="../php/multiUploadManager.php" class="dropzone" id="my-awesome-dropzone">
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div> 
        </form>


    </section>
</div>
<?php include("./footer.php"); ?>