<?php include("./header.php"); ?>
<div id="corp">
    <section id="centre">
       <?php 
       if(!empty($_SESSION['rapports']))
       {
           require_once '../php/Rapport.class.php';
           $rapports=$_SESSION['rapports'];
           echo "<table>";
           for($i=0;$i<count($rapports);$i++)
           {
               $rapports[$i]=unserialize($rapports[$i]);
               echo "<tr>";
               echo "<td>".$rapports[$i]->getNomOrigin()."</td>";
               echo "<td><a href=../rapports/".$rapports[$i]->getNomServ().">télécharger</a></td>";
               echo "</tr>";
           }
           echo "</table>";
       }
       else
       {
           
           echo "dsl votre recherche n'a rien donné";
       }
       
       
       ?>
    </section>
</div>
<?php include("./footer.php"); ?>