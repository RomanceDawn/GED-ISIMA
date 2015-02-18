<?php include("header.php"); ?>


  
<div class="container theme-showcase" role="main">
  
    <div class="panel panel-primary">
    <div class="panel-heading">
         <h3>Ajouter un administrateur</h3>
     </div>
    <div class="panel-body">
    <form class="form-signin" method="post" action="../php/ajouterAdministrateurManager.php" enctype="multipart/form-data">
        <table class="formSpace">
            <tr >
                <td>
                    <label for="login">Login * </label>
                </td>
           
                <td><input type="text" name="login" class="form-control"  value="" id="titre" /></td>

            </tr>
             <tr>
                <td>
                    <label for="password">Mot de passe * </label>
                </td>
           
                <td><input type="password" name="password" class="form-control"  value="" id="password" /></td>

            </tr>
             <tr>
                <td>
                    <label for="password2">Répéter mot de passe * </label>
                </td>
           
                <td><input type="password" name="password2" class="form-control"  value="" id="password2" /></td>

            </tr>
           <?php if (isset($_GET['error_form']))
		    {
			switch ($_GET['error_form'])
			{
			    case 1 :
				echo '<tr><td td colspan="2">Champ login non renseigné</td></tr>';
				break;
			    case 2 :
				echo '<tr><td td colspan="2">Champ mot de passe non renseigné</td></tr>';
				break;
			    case 3 :
				echo '<tr><td td colspan="2">Champ confirmation mot de passe non renseigné</td></tr>';
				break;
			    case 4 :
				echo '<tr><td td colspan="2">Les 2 mots de passes doivent être identiques</td></tr>';
				break;
			    case 5 :
				echo '<tr><td colspan="2">Ce login existe déjà</td></tr>';
				break;
			    case 5 :
				echo '<tr><td colspan="2">le mot de passe doit faire au moins 3 caractères</td></tr>';
				break;
			}
		    }
		    else if (isset($_GET['succes']))
		    {
			echo '<tr><td colspan="2">Ajout d\'un administrateur réussi</td></tr>';
		    }
            ?>
        </table>
        <button type="submit" class="btn btn-default">Valider</button>
    </form>
        </div>
    </div>
    
    
</div>
<?php include("footer.php"); ?>

