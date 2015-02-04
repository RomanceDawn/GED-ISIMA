<?php include("./headerRecherche.php"); ?>
<div id="corp">
    <section id="centre">
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
                   $str_rapport=serialize($rapports[$i]);
                   $_SESSION['rapport']=$str_rapport;
                    echo "<td><a href=modifierRapport.php>Modifier</a></td>";
               }
               echo "</tr>";
           }
           echo "</table>";
       }
       
       
       
       ?>
    </section>
</div>
<?php include("./footer.php"); ?>