<?php

namespace hakuryo\sihamWSClient\administratif;

use hakuryo\sihamWSClient\Utils;
use stdClass;

/**
 * Description of ServicesValide
 *
 * @author dere01
 */
class ServicesValide {

    public $dateDebut;
    public $dateDecision;
    public $dateFin;
    public $dureeSVAssuranceAnnee;
    public $dureeSVAssuranceJour;
    public $dureeSVAssuranceMois;
    public $dureeSVLiquidationAnnee;
    public $dureeSVLiquidationJour;
    public $dureeSVLiquidationMois;
    public $indicateurRetenueRetroactive;
    public $libelleLongIndicateurRetenueRetroactive;
    public $libelleLongServiceAuxiliaire;
    public $libelleLongServiceValideRetraite;
    public $libelleLongStatutAgent;
    public $libelleLongTypeModalite;
    public $libelleStructureAffectation;
    public $matricule;
    public $serviceAuxiliaire;
    public $serviceValideRetraite;
    public $siret;
    public $statutAgent;
    public $tauxActivite;
    public $tauxCotisation;
    public $typeModalite;

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
