<?php include("header.php"); ?>



<div class="container theme-showcase" role="main">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Changer son mot de passe</h3>
        </div>
        <div class="panel-body">
            <form class="form-signin" method="post" action="../php/changerMotDePasseManager.php" enctype="multipart/form-data">
                <table class="formSpace">
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

                        <td><input type="password" name="newPassword2" class="form-control"  value="" id="newPasswordRe" /></td>

                    </tr>
                    <tr><td><button type="submit" class="btn btn-default">Valider</button></td></tr>
		    <?php
		    if (isset($_GET['error_mdp']))
		    {
			switch ($_GET['error_mdp'])
			{
			    case 1 :
				echo '<tr><td td colspan="2">Mot de passe actuel erroné</td></tr>';
				break;
			    case 2 :
				echo '<tr><td td colspan="2">Erreur dans la confirmation du mot de passe</td></tr>';
				break;
			    case 3 :
				echo '<tr><td colspan="2">Champ ancien mot de passe non renseigné</td></tr>';
				break;
			    case 4 :
				echo '<tr><td td colspan="2">Champ nouveau mot de passe non renseigné</td></tr>';
				break;
			    case 5 :
				echo '<tr><td colspan="2">Champ confirmation nouveau mot de passe non renseigné</td></tr>';
				break;
			}
		    }
		    else if (isset($_GET['succes']))
		    {
			echo '<tr><td>mot de passe changé avec succès</td></tr>';
		    }
		    ?>

                </table>

            </form>
        </div>
    </div>


</div>
<?php include("footer.php"); ?>

