
<?php

//require  './DataAccessObject.class.php';
include_once '../php/DataAccessObject.class.php';

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

        $requete = "DELETE FROM `ged_rapport` WHERE `id` = ".$id;
        try {
            $DAO = DataAccessObject::getInstance();
            $DAO->query($requete);
            return $DAO->getLastInsertedID();
        } catch (Exception $e1) {
            throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
        }
    }
    
        public static function getServer_Name($id) {

        $requete = "SELECT `nom_server`FROM `ged_rapport` WHERE `id` = ".$id;
        try {
            $DAO = DataAccessObject::getInstance();
            $result = $DAO->query($requete);
            $name = $DAO->fetch($result);
            return $name[0];
        } catch (Exception $e1) {
            throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
        }
    }
    
      public static function search($titre) {
        $requete = "SELECT  * from ged_rapport";

        //echo '<script type="text/javascript"> alert("'. $requete.'"); </script> ';
        try {
            $DAO = DataAccessObject::getInstance();
            $DAO->query($requete);
            return $DAO->getLastInsertedID();
        } catch (Exception $e1) {
            throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
        }

}
}
