<?php include("./header.php");

if (!empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}
?>
<div id="corp">
    <section id="centre">
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
    </section>
</div>
<?php include("./footer.php"); ?>
