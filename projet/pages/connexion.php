<?php
include("./header.php");

?>
<!--
        <form class="form-inline" method="post" action="../php/connexionManager.php" enctype="multipart/form-data">
            <div class="form-group">
                <label class="sr-only" for="login">Identifiant</label>
                <input type="text" class="form-control" id="login" name="login"  >
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Code confidentiel</label>
                <input type="password" name="password" class="form-control" id="password" >
            </div>
            <button type="submit" class="btn btn-default">Connexion</button>
        </form>
</div>-->
 <div class="container theme-showcase" role="main">
    <form class="form-inline" method="post" action="../php/connexionManager.php" enctype="multipart/form-data">
            <div class="form-group">
                <label class="" for="login">Identifiant</label><br />
                <input type="text" class="form-control" id="login" name="login"  >
            </div>
            <div class="form-group">
                <label class="" for="password">Mot de passe</label><br />
                <input type="password" name="password" class="form-control" id="password" >
                <button type="submit" class="btn btn-default">Connexion</button>
            </div>
           
        </form>
  
</div>
<?php include("./footer.php"); ?>
