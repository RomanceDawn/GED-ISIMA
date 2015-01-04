<?php

class Rapport {

    const ID = 'id';
    const DATE = 'date';
    const MOTS_CLE = 'mots_clefs';
    const NOM_SERV = 'nom_server';
    const NOM_ORIG = 'nom_origin';
    const AUTEUR = 'auteur';

    protected $attributs = array();

    public function getAttributes() {
        return $this->attributs;
    }

    public function __construct($date = NULL, $nom_origin = NULL,$mots_clefs = NULL,
            $nom_server = NULL, $auteur = NULL ) {

        //$this->attributs[self::ID] = $id;
        $this->attributs[self::DATE] = $date;
        $this->attributs[self::NOM_ORIG] = $nom_origin;
        $this->attributs[self::MOTS_CLE] = $mots_clefs;
        $this->attributs[self::NOM_SERV] = $nom_server;
        $this->attributs[self::AUTEUR] = $auteur;
    }
    
    public static function delete(int $id){
        
    }
}
