<?php

namespace sihamWSClient\administratif;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of PIP
 *
 * @author dere01
 */
class PIP {

    public $codeEtablissement;
    public $codeModeAccesPIP;
    public $codePIP;
    public $dateEffetPIP;
    public $dateFinPIP;
    public $libCourtEtablissement;
    public $libLongEtablissement;
    public $libLongModeAccesPIP;
    public $libLongPIP;
    public $matricule;
    public $temValiditePIP;

    
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
