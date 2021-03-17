<?php

namespace sihamWSClient\personnelle;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of NumerosMails
 *
 * @author dere01
 */
class NumerosMails {

    public $codeTypologieNumeroMail;
    public $dateDebutTelephone;
    public $libLongTypologieNumeroMail;
    public $matricule;
    public $numeroMail;

    public function __construct(stdClass $class) {
        $attrs = array_keys(get_object_vars($class));
        foreach ($attrs as $attr) {
            switch ($attr) {
                case "dateDebutTelephone":
                    $this->$attr = Utils::format_date($class->$attr);
                    break;
                default:
                    $this->$attr = $class->$attr;
            }
        }
    }

    public function __toString() {
        return $this->numeroMail;
    }

    function getCodeTypologieNumeroMail() {
        return $this->codeTypologieNumeroMail;
    }

    function getDateDebutTelephone() {
        return $this->dateDebutTelephone;
    }

    function getLibLongTypologieNumeroMail() {
        return $this->libLongTypologieNumeroMail;
    }

    function getMatricule() {
        return $this->matricule;
    }

    function getNumeroMail() {
        return $this->numeroMail;
    }

    function setNumeroMail($numeroMail) {
        $this->numeroMail = $numeroMail;
    }

}
