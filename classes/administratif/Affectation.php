<?php

namespace hakuryo\sihamWSClient\administratif;

use hakuryo\sihamWSClient\Utils;
use stdClass;

/**
 * Description of Affectation
 *
 * @author dere01
 */
class Affectation {

    public $autre;
    public $categorieEmploiPoste;
    public $categorieFP;
    public $codeEmploiAffectation;
    public $codeEtablissement;
    public $codePosteAffectation;
    public $codeStructureNiv2;
    public $codeTypeAffectation;
    public $codeTypeRattachement;
    public $codeUOAffectation;
    public $corpsPoste;
    public $dateDebutAffectation;
    public $dateDebutPoste;
    public $dateFinAffectation;
    public $emploiPoste;
    public $indiceMajore;
    public $libCourtAutre;
    public $libCourtCategorieFP;
    public $libCourtCorpsPoste;
    public $libCourtEtablissement;
    public $libCourtPoste;
    public $libLongCodeUOAffectation;
    public $libLongEmploiAffectation;
    public $libLongEtablissement;
    public $libLongPoste;
    public $libLongStructureNiv2;
    public $libLongTypeAffectation;
    public $libLongTypeRattachement;
    public $matricule;
    public $montantRemunerationMensuelle;
    public $numeroMinisteriel;
    public $quotiteAffectation;
    public $situationPoste;
    public $temValidite;
    public $temoinPostePermanant;

    
   public function __construct(stdClass $class) {
        $attrs = array_keys(get_object_vars($class));
        foreach ($attrs as $attr) {
            switch ($attr) {
                case "dateDebutAdresse":
                    $this->$attr = Utils::format_date($class->$attr);
                    break;
                default:
                    $this->$attr = $class->$attr;
            }
        }
    }
}
