<?php include("header.php"); ?>


  
<div class="container theme-showcase" role="main">
  
    <div class="panel panel-primary">
    <div class="panel-heading">
         <h3>Ajouter un administrateur</h3>
     </div>
    <div class="panel-body">
    <form class="form-signin" method="post" action="../php/rechercheManager.php" enctype="multipart/form-data">
        <table class="formSpace">
            <tr >
                <td>
                    <label for="oldPassword">Login * </label>
                </td>
           
                <td><input type="password" name="oldPassword" class="form-control"  value="" id="titre" /></td>

            </tr>
             <tr>
                <td>
                    <label for="newPassword">Mot de passe * </label>
                </td>
           
                <td><input type="password" name="newPassword" class="form-control"  value="" id="newPassword" /></td>

            </tr>
             <tr>
                <td>
                    <label for="newPasswordRe">Répéter mot de passe * </label>
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

