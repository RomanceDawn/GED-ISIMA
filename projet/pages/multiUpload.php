<?php include("./header.php"); ?>
<div id="corp">
    <section id="centre">        
        <script type="text/javascript">
// "myAwesomeDropzone" is the camelized version of the HTML element's ID
            Dropzone.options.myAwesomeDropzone = {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 50, // MB
                acceptedFiles: ".pdf,.doc,.docx,.odt,.PDF,.ODT,.DOC,.DOCX",
                accept: function (file, done) {
//                    if (file.name == "justinbieber.jpg") {
//                        done("Naha, you don't.");
//                    } else {
                        done();
//                    }
                }
            };
        </script>
        <form action="../php/multiUploadManager.php" class="dropzone" id="my-awesome-dropzone">
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div> 
        </form>


    </section>
</div>
<?php include("./footer.php"); ?>