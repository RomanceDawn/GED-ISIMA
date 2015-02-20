
<?php

//require  './DataAccessObject.class.php';
include_once '../php/DataAccessObject.class.php';
include_once '../php/Rapport.class.php';

/**
 * Create queries and execute them using the DAO
 */
class QueryManager {

    public static function insert(Rapport $object)
    {
	$keys = "(";
	$values = "(";
	foreach ($object->getAttributes() as $col => $value)
	{
	    $keys .= " `" . $col . "`,";

	    if ($value != null) {
		//$value = mysql_real_escape_string($value);
		// $value = mysqli_real_escape_string(DataAccessObject::getInstance()->getLink(), $value);
		$values .= " '" . $value . "',";
	    } else {
		$values .= ' NULL,';
	    }
	}

	$keys[strlen($keys) - 1] = ")";
	$values[strlen($values) - 1] = ")";
	// echo $values;
	$requete = "INSERT INTO `ged_rapport` "
		. $keys . " VALUES " . $values;
	//echo $requete;
	//echo '<script type="text/javascript"> alert("'. $requete.'"); </script> ';

	$requete = "INSERT INTO `ged_rapport` (id, date_creation,date_modification,nom_origin,nom_server,auteur,titre,sujet, mots_clefs,description, ajouteur,texte) values(:id,:date_creation,:date_modification,:nom_origin,:nom_server,:auteur,:titre,:sujet,:mots_clefs,:description,:ajouteur,:texte)";


	try
	{
	    $DAO = DataAccessObject::getInstance();
	    $stmt = $DAO->prepare($requete);
	    $stmt->bindParam(':id', $object->getID());
	    $stmt->bindParam(':date_creation', $object->getDateCreation());
	    $stmt->bindParam(':date_modification', $object->getDateModification());
	    $stmt->bindParam(':nom_origin', $object->getNomOrigin());
	    $stmt->bindParam(':nom_server', $object->getNomServer());
	    $stmt->bindParam(':auteur', $object->getAuteur());
	    $stmt->bindParam(':titre', $object->getTitre());
	    $stmt->bindParam(':sujet', $object->getSujet());
	    $stmt->bindParam(':mots_clefs', $object->getMotsClefs());
	    $stmt->bindParam(':description', $object->getDescription());
	    $stmt->bindParam(':ajouteur', $object->getAjouteur());
	    $stmt->bindParam(':texte', $object->getTexte());
	    $stmt->execute();
	    // $DAO->query($requete);
	    return $DAO->getLastInsertedID();
	} catch (Exception $e1)
	{
	    throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
	}
    }

    public static function delete($id)
    {
	$requete = "DELETE FROM `ged_rapport` WHERE `id` = " . $id;
	try
	{
	    $DAO = DataAccessObject::getInstance();
	    $DAO->query($requete);
	    return $DAO->getLastInsertedID();
	} catch (Exception $e1)
	{
	    throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
	}
    }

    public static function getServer_Name($id)
    {

	$requete = "SELECT `nom_server` FROM `ged_rapport` WHERE `id` = " . $id;
	try
	{
	    $DAO = DataAccessObject::getInstance();
	    $result = $DAO->query($requete);
	    $name = $DAO->fetch($result);
	    return $name[0];
	} catch (Exception $e1)
	{
	    throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
	}
    }

    public static function search($motsClefs, $annee, $auteur, $titre, $sujet, $description)
    {

	$first = true;
	// $requete = "SELECT * FROM `ged_rapport` WHERE `nom_origin`LIKE \"%" . $titre . "%\"";
	$requete = "SELECT * FROM `ged_rapport` ";
	try
	{
	    $DAO = DataAccessObject::getInstance();
	   
	if ($motsClefs != "")
       {
	    $motsClefs=$DAO->safe($motsClefs);
	    $requete = $requete . "WHERE MATCH(`nom_origin`,`mots_clefs`,`auteur`,`sujet`,`titre`,`description`,`texte`) AGAINST ('" . $motsClefs . "')";
	    $first = false;
       }
	if ($auteur != "")
       {
	    $auteur=$DAO->safe($auteur);
	    if ($first)
	   {
		
		$requete = $requete . " WHERE MATCH(`auteur`) AGAINST ('" . $auteur . "')";
		
		$first = false;
	   } else
	   {
		$requete = $requete . " AND MATCH(`auteur`) AGAINST ('" . $auteur . "')";

	   }
       }
	
       if ($titre != "")
       {
	     $titre=$DAO->safe($titre);
	    if ($first)
	   {
		$requete = $requete . " WHERE MATCH(`titre`) AGAINST ('" . $titre . "')";
		$first = false;
	   } else
	   {
		$requete = $requete . " AND MATCH(`titre`) AGAINST ('" . $titre . "')";

	   }
       }
     
	if ($sujet != "")
       {
	   $sujet=$DAO->safe($sujet);
	    if ($first)
	   {
		$requete = $requete . " WHERE MATCH(`sujet`) AGAINST ('" . $sujet . "')";
		$first = false;
	   } else
	   {
		$requete = $requete . " AND MATCH(`sujet`) AGAINST ('" . $sujet . "')";
	   }
       }
	if ($annee != "")
       {
	    $anneeFin = $annee + 1;
	    if ($first)
	   {
		$requete = $requete . " WHERE DATE(`date_creation`) > '" . $annee . "' AND Date(`date_creation`) <'" . $anneeFin . "'";
		$first = false;
	   } else
	   {
		$requete = $requete . " AND DATE(`date_creation`) > '" . $annee . "' AND Date(`date_creation`) <'" . $anneeFin . "'";
	   }
       }

	//   $requete = "SELECT * FROM ged_rapport WHERE MATCH(`nom_origin`,`auteur`,`sujet`,`titre`,`description`,`texte`) AGAINST ('".$motsClefs.",".$annee."')";


	echo $requete;
	//echo '<script type="text/javascript"> alert("'. $requete.'"); </script> ';
	
	    
	    $result = $DAO->query($requete);
	    $i = 0;
	    require_once('Rapport.class.php');
	    $rapports = "";
	    while ($res = $DAO->fetch($result))
	    {
		echo "res : " . $res['id'];
		$rapport = new Rapport($res['description'], $res['titre'], $res['sujet'], $res['date_creation'], $res['date_modification'], $res['nom_origin'], $res['mots_clefs'], $res['nom_server'], $res['auteur'], $res['ajouteur'], "", $res['id']);
		echo $rapport->getID() . " <br />";
		$str_rapport = serialize($rapport);
		$rapports[$i] = $str_rapport;
		$i++;
	    }
	    return $rapports;
	} catch (Exception $e1)
	{
	    throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
	}
    }

    public static function connection($login, $password)
    {

	$requete = "SELECT `login` FROM `ged_compte` WHERE `login`=\"" . $login . "\" AND `password`=\"" . $password . "\"";

	//echo '<script type="text/javascript"> alert("'. $requete.'"); </script> ';
	try
	{
	    $DAO = DataAccessObject::getInstance();
	    $result = $DAO->query($requete);
	    $login = $DAO->fetch($result);
	    return $login[0];
	} catch (Exception $e1)
	{
	    throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
	}
    }

    public static function searchUser($login, $password=NULL)
    {
	$requete="SELECT `login` FROM `ged_compte` WHERE `login`=\"" . $login . "\"";
	if($password!="")
	{
	   $password=md5($password);
	   $requete = $requete. " AND `password`=\"" . $password . "\"";
	}
	
	   
	try
	{
	    $DAO = DataAccessObject::getInstance();
	    $result = $DAO->query($requete);
	    $ret = $DAO->fetch($result);
	    return $ret[0];
	} catch (Exception $e1)
	{
	    throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
	}
    }

    public static function updatePasswordUser($login,$newPassword)
    {
	try
	{
	    $DAO = DataAccessObject::getInstance();
	    $sql = "UPDATE ged_compte SET password=? WHERE login=?";
	    $req = $DAO->prepare($sql);
	    $d = array($newPassword,$login);     
	    $req->execute($d);
	  
	}catch (Exception $e1)
	{
	    throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
	}
    }
    public static function insertUser($login,$password)
    {
	$requete = "INSERT INTO `ged_compte` (login,password) values(:login,:password)";
	try
	{
	    $DAO = DataAccessObject::getInstance();
	    $stmt = $DAO->prepare($requete);
	    $stmt->bindParam(':login', $login);
	    $stmt->bindParam(':password', $password);
	   
	    $stmt->execute();
	    // $DAO->query($requete);
	    return $DAO->getLastInsertedID();
	} catch (Exception $e1)
	{
	    throw new ErrorException("Erreur avec la base de données.", null, null, null, null, $e1);
	}
    }
    
}
