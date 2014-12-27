<?php

$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'uploads';   //2

if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];          //3             

    $targetPath = "../rapports/";  //4

    $targetFile = $targetPath . $_FILES['file']['name'];  //5

    move_uploaded_file($tempFile, $targetFile); //6
}
  
?>
<?php include("../header.php"); ?>
        <div id="corp">
            <section id="centre">
                <form action="multiUpload.php" class="dropzone" id="my-awesome-dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div> 
                </form>
            </section>
        </div>
<?php include("../footer.php"); ?>