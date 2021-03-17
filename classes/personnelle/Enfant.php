<?php

namespace sihamWSClient\personnelle;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of Enfant
 *
 * @author dere01
 */
class Enfant {

    public $codeDptNaissanceEnfant;
    public $codeEtablissement;
    public $codeSexeEnfant;
    public $dateDecesEnfant;
    public $dateNaissanceEnfant;
    public $debutSFTEnfant;
    public $finSFTEnfant;
    public $libLongDeptNaissanceEnfant;
    public $libLongNatureParente;
    public $libLongPaysNaissanceEnfant;
    public $libSexeEnfant;
    public $matricule;
    public $matriculeEnfant;
    public $natureParente;
    public $nomEnfant;
    public $paysNaissanceEnfant;
    public $prenomEnfant;
    public $tauxHandicapEnfant;
    public $temoinSFTEnfant;
    public $villeNaissanceEnfant;

    public function __construct(stdClass $class) {
        $attrs = array_keys(get_object_vars($class));
        foreach ($attrs as $attr) {
            switch ($attr) {
                case "dateNaissanceEnfant":
                    $this->$attr = Utils::format_date($class->$attr);
                    break;
                default:
                    $this->$attr = $class->$attr;
            }
        }
    }

}
