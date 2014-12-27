<?php

/**
 * Manage access to the database
 * This class is a singleton
 */
class DataAccessObject {

    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DATABASE = "ged_isima";

    /** The current instance of the class */
    private static $instance = null;

    /**
     * Construct the object and connect it to the database
     * @throws ErrorException if an error occured with the databse
     */
    private function __construct() {
        $link = mysqli_connect(self::SERVER, self::USER, self::PASSWORD, self::DATABASE)
                or die("Error " . mysqli_error($link));
//        if (!mysqli_select_db()) {
//            throw new ErrorException("Impossible de sélectionner la base de données: " . mysql_error(), mysql_errno());
//        }
        $link->query("SET names 'utf8';");
        // mysql_query("SET names 'utf8';"); // TODO voir si on garde
    }

    /**
     * Return the current instance of the class.
     * @return DataAccessObject 
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DataAccessObject();
        }
        return self::$instance;
    }

    /**
     * Execute the given query
     * @param string $query
     * @throws ErrorException if an error occured with the database
     * @return ressource 
     */
    public function query($query) {
        $ressource = mysql_query($query);
        if ($ressource === false) {
            throw new ErrorException(mysql_error(), mysql_errno());
        }
        return $ressource;
    }

    /**
     * Fetch the given ressource
     * @param ressource $ressource the ressource to fetch
     * @param int $fetch_type [optional] the way to fetch
     * @throws InvalidArgumentException if parameter 1 is not a ressource
     * @return array 
     */
    public function fetch($ressource, $fetch_type = MYSQL_BOTH) {
        if (!is_resource($ressource)) {
            throw new InvalidArgumentException("Parameter 1 must be a ressource.");
        }
        return mysql_fetch_array($ressource, $fetch_type);
    }

    /**
     * Return the last automatic generated ID
     * @param ressource $ressource [optional]
     * @throws InvalidArgumentException if parameter 1 is not a ressource
     * @throws ErrorException if an error occured with the database
     * @throws BadMethodCallException if there is no ID which was automatically generate
     * @return int the last automatic generated ID
     */
    public function getLastInsertedID($ressource = null) {
        if ($ressource != null) {
            if (!is_resource($ressource)) {
                throw new InvalidArgumentException("Parameter 1 must be a ressource.");
            }
            $id = mysqli_insert_id($ressource);
        } else {
            $id = false;
        }
        if ($id === false) {
            throw new ErrorException("Error with the database.");
        }
        if ($id == 0) {
            throw new BadMethodCallException("The previous query didn't generate an automatic ID.");
        }

        return $id;
    }

}
