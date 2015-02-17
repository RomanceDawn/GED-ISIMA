<?php include("./header.php");?>
 <div class="container theme-showcase" role="main">
     <div class="panel panel-primary">
    <div class="panel-heading">
         <h3>Connexion</h3>
     </div>
    <div class="panel-body">
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
     </div>
</div>
<?php include("./footer.php"); ?>
