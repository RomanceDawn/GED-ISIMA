<?php include("./header.php"); ?>
 <div id="corp">
            <section id="centre">
                <form method="post" action="../php/connexionManager.php" enctype="multipart/form-data"> 
                <label for="login">login :</label><br />
                <input type="text" name="login" value="admin" id="login" /><br />
                <label for="password">password :</label><br />
                <input type="password" name="password" value="admin" id="password" /><br />
                <input type="submit" name="submit" value="Connexion" />
</form>
            </section>
        </div>
<?php include("./footer.php"); ?>
