<?php include("./header.php"); ?>
 <div class="container theme-showcase" role="main">
       <?php 
       if(!empty($_SESSION['rapports']))
       {
           require_once '../php/Rapport.class.php';
           $rapports=$_SESSION['rapports'];
           echo "<table id=\"resultat\">";
           for($i=0;$i<count($rapports);$i++)
           {
               $rapports[$i]=unserialize($rapports[$i]);
               echo "<tr>";
               $nomAffichage="Rapport de ".$rapports[$i]->getAuteur();
               echo "<td>".$nomAffichage."</td>";
               echo "<td><a href=../rapports/".$rapports[$i]->getNomServ()." TARGET=\"_blank\">télécharger</a></td>";
               if (!empty($_SESSION['login'])) {
                   $id=$rapports[$i]->getID();
                   $str_rapport=serialize($rapports[$i]);
                   $_SESSION['rapport']=$str_rapport;
                    echo "<td><a href=modifierRapport.php>Modifier</a></td>";
                    echo "<form action= \"../php/suppressionManager.php\" method=\"post\" name=\"formu\" id=\"formu\">
                    <input name=\"id\" type = \"hidden\" id = \"id\" value = ".$id.">
                   <td><button id=\"buttonDelete\">Supprimer</button></td>
                    </form>";
                    //echo "<td><a href=../php/suppressionManager.php>Supprimer</a></td>";
               }
               echo "</tr>";
           }
           echo "</table>";
       }
       
       
       
       ?>
</div>
<?php include("./footer.php"); ?>