<?php include("./headerRecherche.php"); ?>
<div id="corp">
    <section id="centre">
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
                        <label for="titre">sujet : </label>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="sujet" value="" id="sujet" /></td>
                    
                </tr>
                 <tr>
                    <td>
                        <label for="titre">description : </label>
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
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2008</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="titre">mots-clés : </label></td>
                </tr>
                <tr>
                    <td><input type="text" name="motsClefs" value="" id="motsClefs" /></td>
                    
                </tr>
                <tr><td><input type="submit" name="submit" value="Rechercher"></td></tr>
            </table>
                 
        </form>
    </section>
</div>
<?php include("./footer.php"); ?>