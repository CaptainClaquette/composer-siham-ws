<?php

namespace sihamWSClient\administratif;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of Notation
 *
 * @author dere01
 */
class Notation {

    public $anneeNotation;
    public $codeEchelon;
    public $codeEtablissement;
    public $codeGradeNotation;
    public $dateEffetNotation;
    public $libCourtCategorieFP;
    public $libCourtEtablissement;
    public $libLongCategorieFP;
    public $libLongEtablissement;
    public $libLongGrade;
    public $matricule;
    public $noteDefinitive;
    public $noteProposee;
    public $noteProvisoire;
    public $noteTheorique;

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
