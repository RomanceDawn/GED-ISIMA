<?php include("./header.php"); ?>
 <div class="container theme-showcase" role="main">
     <div class="page-header">
         <h1>Résultat Recherche</h1>
         
     </div>
       <?php 
       if(!empty($_SESSION['rapports']))
       {
           require_once '../php/Rapport.class.php';
           $rapports=$_SESSION['rapports'];
           echo "<div class=\"col-md-6\">";
           echo "<table class=\"table table-striped\">";
           echo"<tbody>";
           for($i=0;$i<count($rapports);$i++)
           {
               $rapports[$i]=unserialize($rapports[$i]);
               
               echo "<tr id=\"".$rapports[$i]->getID()."\">";
               $nomAffichage="Rapport de ".$rapports[$i]->getAuteur();
      
               echo "<td>".$nomAffichage."</td>";
               echo "<td><a href=../rapports/".$rapports[$i]->getNomServ()." TARGET=\"_blank\">Télécharger</a></td>";
               if (!empty($_SESSION['login'])) {
                   $id=$rapports[$i]->getID();
                   $str_rapport=serialize($rapports[$i]);
                   $_SESSION['rapport']=$str_rapport;
                    echo "<td><a href=modifierRapport.php>Modifier</a></td>";
                   echo "<td><a href='#' onClick=supprimerRapport('".$rapports[$i]->getID()."');return false;\">Supprimer</a></td>";
                    //echo "<td><a href=../php/suppressionManager.php>Supprimer</a></td>";
               }
               echo "</tr>";
           }
           echo "</tbody>";
           echo "</table>";
           echo "</div>";
       }
       
       
       
       ?>
</div>
<?php include("./footer.php"); ?>