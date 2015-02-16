<?php include("./header.php"); ?>
 <div class="container theme-showcase" role="main">
   <div class="page-header">
         <h1>Recherche de rapports</h1>
         
     </div>
    <form method="post" action="../php/rechercheManager.php" enctype="multipart/form-data">
        <table>

            <tr>
                <td>
                    <label for="titre">intitule : </label>
                </td>
                
            </tr>
            <tr>
                <td><input type="text" name="titre" value="" id="titre" /></td>

            </tr>
             <tr>
                <td>
                    <label for="sujet">sujet : </label>
                </td>
            </tr>
            <tr>
                <td><input type="text" name="sujet" value="" id="sujet" /></td>

            </tr>
             <tr>
                <td>
                    <label for="description">description : </label>
                </td>
            </tr>
            <tr>
                <td><input type="text" name="description" value="" id="description" /></td>

            </tr>
            <tr>
                <td>
                    <label for="auteur">auteur : </label>
                </td>
            </tr>
            <tr>
                <td><input type="text" name="auteur" value="" id="titre" /></td>

            </tr>
            <tr>
                <td><label for="annee">année : </label></td>
            </tr>
            <tr>
                <td> 
                <select name="annee" id="annee">
                    <option value=""></option>
                   <?php
                    $tmp = intval(date('o'));
                    for ($index = $tmp; $index >=1993 ; $index--) {
                    echo '<option value="'.$index.'">'.$index.'</option>';
                    }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td><label for="mots-clés">mots-clés : </label></td>
            </tr>
            <tr>
                <td><input type="text" name="motsClefs" value="" id="motsClefs" /></td>

            </tr>
            <tr><td><input type="submit" name="submit" value="Rechercher"></td></tr>
<?php         if (isset($_GET['erreur'])) {
            switch ($_GET['erreur']) {
                case 1:
                    echo '<tr><td>Aucun résultat</td></tr>';
                    break;

            }
        }
?>

         </table>
    </form>

<?php include("./footer.php"); ?>