<?php include("./header.php"); ?>
<div id="corp">
    <section id="centre">        
        <script type="text/javascript">
// "myAwesomeDropzone" is the camelized version of the HTML element's ID
            Dropzone.options.myAwesomeDropzone = {
                init: function () {
                    this.on("addedfile", function (file) {
                        var parts = file.name.split(".");
                        var ext = (parts[(parts.length - 1)]).toLowerCase();
                        switch (ext) {
                            case "pdf":
                                this.emit("thumbnail", file, "../images/pdf.png");
                                break;
                            case "docx":
                                this.emit("thumbnail", file, "../images/docx.png");
                                break;
                            case "doc":
                                this.emit("thumbnail", file, "../images/doc.png");
                                break;
                            case "odt":
                                this.emit("thumbnail", file, "../images/odt.png");
                                break;
                        }
                    });
                },
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 64, // MB
                acceptedFiles: ".pdf,.doc,.docx,.odt,.ODT,.DOC,.DOCX",
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