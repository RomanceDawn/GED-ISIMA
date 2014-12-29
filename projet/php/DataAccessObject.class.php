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
    private $link;
    
    function getLink() {
        return $this->link;
    }

        /**
     * Construct the object and connect it to the database
     * @throws ErrorException if an error occured with the databse
     */
    private function __construct() {
        $this->link = new mysqli(self::SERVER, self::USER, self::PASSWORD, self::DATABASE);
        if (mysqli_connect_errno()) {
            throw new ErrorException("Impossible de se connecter à la base de données: "
            . mysqli_error($this->link), mysqli_errno($this->link));
        }
        $this->link->query("SET names 'utf8';");
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
        $result = $this->link->query($query);
        if ($result === false) {
            throw new ErrorException(mysqli_error($this->link), mysqli_errno($this->link));
        }
        return $result;
    }

    /**
     * 
     * @param mysqli_result $result
     * @param type $fetch_type
     * @return type
     * @throws InvalidArgumentException
     */
    public function fetch($result, $fetch_type = MYSQLI_BOTH) {
        if (!($result instanceof mysqli_result)) {
            throw new InvalidArgumentException("Parameter 1 must be a result.");
        }
        return $result->fetch_array($fetch_type);
    }

    /**
     * 
     * @return type
     */
    public function getLastInsertedID() {

        return $this->link->insert_id;
    }

}

?>