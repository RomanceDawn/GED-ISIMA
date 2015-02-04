
<?php

//require  './DataAccessObject.class.php';
include_once '../php/DataAccessObject.class.php';
include_once '../php/Rapport.class.php';

/**
 * Create queries and execute them using the DAO
 */
class QueryManager {

    public static function insert(Rapport $object) {
        $keys = "(";
        $values = "(";
        foreach ($object->getAttributes() as $col => $value) {
            $keys .= " `" . $col . "`,";
            if ($value != null) {
                //$value = mysql_real_escape_string($value);

                $value = mysqli_real_escape_string(DataAccessObject::getInstance()->getLink(), $value);
                $values .= " '" . $value . "',";
            } else {
                $values .= ' NULL,';
            }
        }
        $keys[strlen($keys) - 1] = ")";
        $values[strlen($values) - 1] = ")";

        $requete = "INSERT INTO `ged_rapport` "
                . $keys . " VALUES " . $values;

        //echo '<script type="text/javascript"> alert("'. $requete.'"); </script> ';
        try {
            $DAO = DataAccessObject::getInstance();
            $DAO->query($requete);
            return $DAO->getLastInsertedID();
        } catch (Exception $e1) {
            throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
        }
    }

    public static function delete($id) {
        $requete = "DELETE FROM `ged_rapport` WHERE `id` = " . $id;
        try {
            $DAO = DataAccessObject::getInstance();
            $DAO->query($requete);
            return $DAO->getLastInsertedID();
        } catch (Exception $e1) {
            throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
        }
    }

    public static function getServer_Name($id) {

        $requete = "SELECT `nom_server` FROM `ged_rapport` WHERE `id` = " . $id;
        try {
            $DAO = DataAccessObject::getInstance();
            $result = $DAO->query($requete);
            $name = $DAO->fetch($result);
            return $name[0];
        } catch (Exception $e1) {
            throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
        }
    }

    public static function search($motsClefs,$annee,$auteur,$titre,$sujet,$description) {

       $first=true;
       // $requete = "SELECT * FROM `ged_rapport` WHERE `nom_origin`LIKE \"%" . $titre . "%\"";
       $requete= "SELECT * FROM ged_rapport ";
       if($motsClefs!="")
       {
           $requete=$requete."WHERE MATCH(`nom_origin`,`auteur`,`sujet`,`titre`,`description`,`texte`) AGAINST ('".$motsClefs."')";
           $first=false;
       }
       if($auteur!="")
       {
           if($first)
           {
               $requete=$requete." WHERE MATCH(`auteur`) AGAINST ('".$auteur."')"; 
               $first=false;
           }
           else
           {
               $requete=$requete." AND MATCH(`auteur`) AGAINST ('".$auteur."')"; 
           
           }
       }
       if($titre!="")
       {
           if($first)
           {
               $requete=$requete." WHERE MATCH(`titre`) AGAINST ('".$titre."')"; 
               $first=false;
           }
           else
           {
               $requete=$requete." AND MATCH(`titre`) AGAINST ('".$titre."')"; 
           
           }
       }
       if($description!="")
       {
           if($first)
           {
               $requete=$requete." WHERE MATCH(`description`) AGAINST ('".$description."')"; 
               $first=false;
           }
           else
           {
               $requete=$requete." AND MATCH(`description`) AGAINST ('".$description."')"; 
           }
       }
       if($annee!="")
       {
           $anneeFin=$annee+1;
           if($first)
           {
               $requete=$requete." WHERE `date_creation` > ".$annee; 
               $first=false;
           }
           else
           {
               $requete=$requete." AND `date_creation` > ".$annee." AND `date_creation` <".$anneeFin;   
           }
       }
       
    //   $requete = "SELECT * FROM ged_rapport WHERE MATCH(`nom_origin`,`auteur`,`sujet`,`titre`,`description`,`texte`) AGAINST ('".$motsClefs.",".$annee."')";
      
       
       echo $requete;
        //echo '<script type="text/javascript"> alert("'. $requete.'"); </script> ';
        try {
            $DAO = DataAccessObject::getInstance();
            $result = $DAO->query($requete);
            $i=0;
            require_once('Rapport.class.php');
            $rapports="";
            while($res = $DAO->fetch($result))
            {
                $rapport = new Rapport($res['description'] , $res['titre'] , $res['sujet'] , $res['date_creation'] , $res['date_modification'] , 
                        $res['nom_origin'] , $res['mots_clefs'] , $res['nom_server'] , $res['auteur'] , $res['ajouteur']);
                $str_rapport=serialize($rapport);
                $rapports[$i]=$str_rapport;
                $i++;
       
            }
            return $rapports;
        } catch (Exception $e1) {
            throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
        }
    }

    public static function connection($login, $password) {

        $requete = "SELECT `login` FROM `ged_compte` WHERE `login`=\"" . $login . "\" AND `password`=\"" . $password . "\"";

        //echo '<script type="text/javascript"> alert("'. $requete.'"); </script> ';
        try {
            $DAO = DataAccessObject::getInstance();
            $result = $DAO->query($requete);
            $login = $DAO->fetch($result);
            return $login[0];
        } catch (Exception $e1) {
            throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
        }
    }

}
