<?php

namespace sihamWSClient\personnelle;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of ListeAdresse
 *
 * @author dere01
 */
class Adresse {

    public $bisTerAdresse;
    public $bureauDistributeurAdresse;
    public $codeDepartementAdresse;
    public $codePaysINSEEAdresse;
    public $codePaysISOAdresse;
    public $codePostalAdresse;
    public $codeTypologieAdresse;
    public $communeEtatAdresse;
    public $complementAdresse;
    public $dateDebutAdresse;
    public $libLongDepartementAdresse;
    public $libLongPaysAdresse;
    public $libLongTypologieAdresse;
    public $ligneAdresseDestination;
    public $ligneAdresseVoie;
    public $matricule;
    public $natureVoieAdresse;
    public $noVoieAdresse;
    public $nomVoieAdresse;
    public $temAdressePrincipale;

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
