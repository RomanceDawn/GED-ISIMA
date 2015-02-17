<?php include("header.php"); ?>


  
<div class="container theme-showcase" role="main">
  
    <div class="panel panel-primary">
    <div class="panel-heading">
         <h3>Changer son mot de passe</h3>
     </div>
    <div class="panel-body">
    <form class="form-signin" method="post" action="../php/rechercheManager.php" enctype="multipart/form-data">
        <table class="formUpdatePass">
            <tr >
                <td>
                    <label for="oldPassword">Ancien mot de passe * </label>
                </td>
           
                <td><input type="password" name="oldPassword" class="form-control"  value="" id="titre" /></td>

            </tr>
             <tr>
                <td>
                    <label for="newPassword">Nouveau mot de passe * </label>
                </td>
           
                <td><input type="password" name="newPassword" class="form-control"  value="" id="newPassword" /></td>

            </tr>
             <tr>
                <td>
                    <label for="newPasswordRe">Confirmation * </label>
                </td>
           
                <td><input type="password" name="newPasswordRe" class="form-control"  value="" id="newPasswordRe" /></td>

            </tr>
          
            
        </table>
        <button type="submit" class="btn btn-default">Valider</button>
    </form>
        </div>
    </div>
    
    
</div>
<?php include("footer.php"); ?>

