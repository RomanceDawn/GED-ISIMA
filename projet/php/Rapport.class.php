<?php

class Rapport {

    const ID = 'id';
    const DATE_CREATION = 'date_creation';
    const DATE_MODIFICATION = 'date_modification';
    const MOTS_CLES = 'mots_clefs';
    const NOM_SERV = 'nom_server';
    const NOM_ORIG = 'nom_origin';
    const AUTEUR = 'auteur';
    const DESCRIPTION = 'description';
    const SUJET = 'sujet';
    const TITRE = 'titre';
    const AJOUTEUR = 'ajouteur';
    const TEXTE = 'texte';

    protected $attributs = array();

    
    public function getNomOrigin()
    {
       return  $this->attributs[self::NOM_ORIG];
    }
     public function getTitre()
    {
       return  $this->attributs[self::TITRE];
    }
    public function getNomServ()
    {
       return  $this->attributs[self::NOM_SERV];
    }
    
    public function getAuteur()
    {
       return  $this->attributs[self::AUTEUR];
    }
    
    public function getAttributes() {
        return $this->attributs;
    }

    public function getAnnee()
    {
        $annee=substr($this->attributs[self::DATE_CREATION],0,4);
        return $annee;
    }
    
    public function getSujet()
    {
        return $this->attributs[self::SUJET];
    }
    public function getDescription()
    {
        return $this->attributs[self::DESCRIPTION];
    }
    
    public function getMotsClefs()
    {
        return $this->attributs[self::MOTS_CLES];
    }
    
    public function getID()
    {
        return $this->attributs[self::ID];
    }
    
    
    public function __construct($description = NULL, $titre = NULL, $sujet = NULL, $date_creation = NULL, $date_modification = NULL, $nom_origin = NULL, $mots_clefs = NULL, $nom_server = NULL, $auteur = NULL, $ajouteur = NULL ,$texte=NULL,$id=NULL) {

        $this->attributs[self::ID] = $id;
        $this->attributs[self::DATE_CREATION] = $date_creation;
        $this->attributs[self::DATE_MODIFICATION] = $date_modification;
        $this->attributs[self::NOM_ORIG] = $nom_origin;
        $this->attributs[self::NOM_SERV] = $nom_server;
        $this->attributs[self::AUTEUR] = $auteur;
        $this->attributs[self::TITRE] = $titre;
        $this->attributs[self::SUJET] = $sujet;
        $this->attributs[self::MOTS_CLES] = $mots_clefs;
        $this->attributs[self::DESCRIPTION] = $description;
        $this->attributs[self::AJOUTEUR] = $ajouteur;
        $this->attributs[self::TEXTE] = $texte;
    }

//    public static function delete(int $id) {
//        
//    }
}
