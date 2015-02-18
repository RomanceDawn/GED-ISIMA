<?php
include("./header.php");


if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}

?>
 <div class="container theme-showcase" role="main">
   <div class="panel panel-primary">
    <div class="panel-heading">
         <h3>Upload multiple</h3>
     </div>
    <div class="panel-body">
        <div id="actions" class="row">

            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                </button>
            </div>

            <div class="col-lg-5">
                <!-- The global file processing state -->
                <span class="fileupload-process">
                    <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                    </div>
                </span>
            </div>

        </div>

        <div class="table table-striped" class="files" id="previews">

            <div id="template" class="file-row">
                <!-- This is used as the file preview template -->
<!--                <div>
                    <span class="preview"><img data-dz-thumbnail /></span>
                </div>-->
                <div class="dropName">
                    <p class="name" data-dz-name></p>
                    <strong class="error text-danger" data-dz-errormessage></strong>
                </div>
                <div  class="dropBar">
                    <p class="size" data-dz-size></p>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary start">
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                    <button data-dz-remove class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                    <button data-dz-remove class="btn btn-danger delete">
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                </div>
            </div>

        </div>

        <script>
            // Get the template HTML and remove it from the doument
            var previewNode = document.querySelector("#template");
            previewNode.id = "";
            var previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);

            var myDropzone = new Dropzone(document.body, {// Make the whole body a dropzone
                url: "../php/multiUploadManager.php", // Set the url
                parallelUploads: 1,
                previewTemplate: previewTemplate,
                createImageThumbnails: false,
                acceptedFiles: ".pdf",
                maxFilesize: 128,
                paramName: "file",
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            });

            myDropzone.on("success", function (file, response) {
                file.serverId = response;
//                alert(response);
            });

            myDropzone.on("removedfile", function (file) {
//                alert(file.serverId);

//            $.ajax({
//                url: "../php/delete.php",
//                type: "POST",
//                data: {'id': file.serverId}
//            });   
                try
                {
                    var XhrObj = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e)
                {
                    var XhrObj = new XMLHttpRequest();
                }



                XhrObj.open("POST", "../php/deleteManager.php");
                XhrObj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                XhrObj.send("id=" + file.serverId);


            });
            myDropzone.on("addedfile", function (file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick = function () {
                    myDropzone.enqueueFile(file);
                };
            });

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function (progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
            });

            myDropzone.on("sending", function (file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1";
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
            });

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function (progress) {
                document.querySelector("#total-progress").style.opacity = "0";
            });

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function () {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
            };
            document.querySelector("#actions .cancel").onclick = function () {
                myDropzone.removeAllFiles(true);
            };
        </script>


</div>
   </div>
 </div>
<?php
include("./footer.php");
?>