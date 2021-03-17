<?php

namespace sihamWSClient\administratif;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of AbsencesConges
 *
 * @author dere01
 */
class AbsenceConge {

    public $codeEtablissement;
    public $codeMotifAbsenceConge;
    public $dateDebutAbsenceConge;
    public $dateDecisionAbsenceConge;
    public $dateFinAbsenceConge;
    public $libCourtEtablissement;
    public $libLongEtablissement;
    public $libLongMotifAbsenceConge;
    public $matricule;
    public $numeroArreteAbsenceConge;
    public $temValiditeAbsenceConge;

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
