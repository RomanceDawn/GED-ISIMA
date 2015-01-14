<?php

class Rapport {

    const ID = 'id';
    const DATE_CREATION = 'date_creation';
    const DATE_MODIFICATION = 'date_modification';
    const MOTS_CLE = 'mots_clefs';
    const NOM_SERV = 'nom_server';
    const NOM_ORIG = 'nom_origin';
    const AUTEUR = 'auteur';
    const DESCRIPTION = 'description';
    const SUJET = 'sujet';
    const TITRE = 'titre';
    const AJOUTEUR = 'ajouteur';

    protected $attributs = array();

    
    public function getNomOrigin()
    {
       return  $this->attributs[self::NOM_ORIG];
    }
    
      public function getNomServ()
    {
       return  $this->attributs[self::NOM_SERV];
    }
    
    
    public function getAttributes() {
        return $this->attributs;
    }

    public function __construct($description = NULL, $titre = NULL, $sujet = NULL, $date_creation = NULL, $date_modification = NULL, $nom_origin = NULL, $mots_clefs = NULL, $nom_server = NULL, $auteur = NULL, $ajouteur = NULL) {

        //$this->attributs[self::ID] = $id;
        $this->attributs[self::DATE_CREATION] = $date_creation;
        $this->attributs[self::DATE_MODIFICATION] = $date_modification;
        $this->attributs[self::NOM_ORIG] = $nom_origin;
        $this->attributs[self::NOM_SERV] = $nom_server;
        $this->attributs[self::AUTEUR] = $auteur;
        $this->attributs[self::TITRE] = $titre;
        $this->attributs[self::SUJET] = $sujet;
        $this->attributs[self::MOTS_CLE] = $mots_clefs;
        $this->attributs[self::DESCRIPTION] = $description;
        $this->attributs[self::AJOUTEUR] = $ajouteur;
    }

//    public static function delete(int $id) {
//        
//    }
}
