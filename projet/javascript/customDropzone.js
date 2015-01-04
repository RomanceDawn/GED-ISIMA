
// "myAwesomeDropzone" is the camelized version of the HTML element's ID
Dropzone.options.myAwesomeDropzone = {
    init: function () {
//        this.on("addedfile", function (file) {
//            var parts = file.name.split(".");
//            var ext = (parts[(parts.length - 1)]).toLowerCase();
//            switch (ext) {
//                case "pdf":
//                    this.emit("thumbnail", file, "../images/pdf.png");
//                    break;
//                case "docx":
//                    this.emit("thumbnail", file, "../images/docx.png");
//                    break;
//                case "doc":
//                    this.emit("thumbnail", file, "../images/doc.png");
//                    break;
//                case "odt":
//                    this.emit("thumbnail", file, "../images/odt.png");
//                    break;
//            }
//        });
        this.on("success", function (file, response) {
            file.serverId = response;
            alert(response);
        });
        this.on("removedfile", function (file) {
            alert(file.serverId);

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



            XhrObj.open("POST", "../php/delete.php");
            XhrObj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            XhrObj.send("id=" + file.serverId );


        });
    },
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 64, // MB
    createImageThumbnails: false,
    acceptedFiles: ".pdf,.doc,.docx,.odt,.ODT,.DOC,.DOCX",
    accept: function (file, done) {
//                    if (file.name == "justinbieber.jpg") {
//                        done("Naha, you don't.");
//                    } else {
        done();
//                    }
    },
    previewTemplate: "<div class=\"table table-striped\" class=\"files\" id=\"previews\"> <div id=\"template\" class=\"file-row\">     <!-- This is used as the file preview template -->      <div>         <p class=\"name\" data-dz-name></p>         <strong class=\"error text-danger\" data-dz-errormessage></strong>     </div>     <div>         <p class=\"size\" data-dz-size></p>         <div class=\"progress progress-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" aria-valuenow=\"0\">           <div class=\"progress-bar progress-bar-success\" style=\"width:0%;\" data-dz-uploadprogress></div>         </div>     </div>     <div>        <button data-dz-remove class=\"btn btn-danger btn-sm delete\">         <i class=\"glyphicon glyphicon-trash\"></i>         <span>Delete</span>       </button>     </div>   </div>   </div>"

};

