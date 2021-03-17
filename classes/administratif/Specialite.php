<?php

namespace hakuryo\sihamWSClient\administratif;

use hakuryo\sihamWSClient\Utils;
use stdClass;

/**
 * Description of Specialite
 *
 * @author dere01
 */
class Specialite {

    public $codeEmplTypeAgt;
    public $codeEtablissement;
    public $codeSpecialiteNiv1Agt;
    public $codeSpecialiteNiv2Agt;
    public $dateDebSpecialite;
    public $dateFinSpecialite;
    public $libCourtEmpTypeAgt;
    public $libCourtEtablissement;
    public $libCourtSpecialiteNiv1Agt;
    public $libCourtSpecialiteNiv2Agt;
    public $libLongEmpTypeAgt;
    public $libLongEtablissement;
    public $libLongSpecialiteNiv1Agt;
    public $libLongSpecialiteNiv2Agt;
    public $libLongTypeSpecialite;
    public $matricule;
    public $temoinHeritPoste;
    public $typeSpecialiteAgent;

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
