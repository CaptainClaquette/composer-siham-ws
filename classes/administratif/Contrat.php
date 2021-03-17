<?php

namespace hakuryo\sihamWSClient\administratif;

use hakuryo\sihamWSClient\Utils;
use stdClass;

/**
 * Description of Contrat
 *
 * @author dere01
 */
class Contrat {

    public $chevron;
    public $codeEtablissement;
    public $codeFrequencePaiementContrat;
    public $codeModeGestionContrat;
    public $codeTypeContrat;
    public $commentaire;
    public $dateDebutContrat;
    public $dateFinPrevueContrat;
    public $dateFinReelleContrat;
    public $gradeTG;
    public $horsEchelleLettre;
    public $indiceRemu;
    public $libCourtEtablissement;
    public $libLongEtablissement;
    public $libLongFrequencePaiementContrat;
    public $libLongTypeContrat;
    public $matricule;
    public $modeRemuneration;
    public $natureContrat;
    public $nbHeuresContrat;
    public $numAvenantContrat;
    public $pourcentage;
    public $rangContrat;
    public $remunerationContrat;
    public $tauxHoraireContrat;
    public $temEnseignantChercheur;
    public $temValiditeContrat;

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
