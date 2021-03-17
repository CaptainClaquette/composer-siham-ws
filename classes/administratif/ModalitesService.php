<?php

namespace sihamWSClient\administratif;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of ModalitesService
 *
 * @author dere01
 */
class ModalitesService {

    public $codeEtablissement;
    public $codeTempsIncomplet;
    public $codeTypeModaliteService;
    public $dateDebutModaliteService;
    public $dateFinModaliteService;
    public $heurePresenceParMois;
    public $heurePresenceParSemaine;
    public $heuresPresenceParJour;
    public $libCourtEtablissement;
    public $libLongEtablissement;
    public $libLongTempsIncomplet;
    public $libLongTypeModaliteService;
    public $matricule;
    public $numeroArreteModaliteService;
    public $ratioHeurePresenceTempsPlein;
    public $temValiditeModaliteService;

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
