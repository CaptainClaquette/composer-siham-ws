<?php

namespace sihamWSClient\administratif;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of PositionsAdministrative
 *
 * @author dere01
 */
class PositionsAdministrative {

    public $codeEtablissement;
    public $codeModaliteDelegation;
    public $codeMotifPosition;
    public $codePositionAdmin;
    public $codePositionStatutaire;
    public $dateDebutPositionAdmin;
    public $dateFinPrevuePositionAdmin;
    public $dateFinReellePositionAdmin;
    public $libCourtEtablissement;
    public $libLongEtablissement;
    public $libLongMotifPosition;
    public $libLongPositionAdmin;
    public $libLongPositionStatutaire;
    public $libModaliteDelegation;
    public $matricule;
    public $temValiditePosition;

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
