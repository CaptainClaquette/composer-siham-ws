<?php

namespace sihamWSClient\administratif;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of Carriere
 *
 * @author dere01
 */
class Carriere {

    public $ancConservee;
    public $codeChevron;
    public $codeCorps;
    public $codeEchelon;
    public $codeEtablissement;
    public $codeGrade;
    public $codeGroupeHierarchique;
    public $codeModeAcces;
    public $codeModeAccesCorps;
    public $codeQualiteStatutaire;
    public $dateDebutCorps;
    public $dateDebutGrade;
    public $dateEffetCarriere;
    public $dateFinCorps;
    public $dateFinGrade;
    public $indiceBrut;
    public $indiceMajore;
    public $indiceManuel;
    public $libCourtCategorieFP;
    public $libCourtEtablissement;
    public $libLongCategorieFP;
    public $libLongCorps;
    public $libLongEtablissement;
    public $libLongGrade;
    public $libLongGroupeHierarchique;
    public $libLongModeAcces;
    public $libLongModeAccesCorps;
    public $libLongQualiteStatutaire;
    public $matricule;
    public $motifIndiceManuel;
    public $nbAnneesAncConservee;
    public $nbJoursAncConservee;
    public $nbMoisAncConservee;
    public $numeroCarriere;
    public $organismePrincipal;
    public $temEnseignantChercheur;
    public $temValiditeCarriere;

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
