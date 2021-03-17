<?php

namespace sihamWSClient\personnelle;

use DateTime;

/**
 * Description of ParamListAgent
 *
 * @author dere01
 */
class ParamListAgent {

    protected $codeEtablissement;
    protected $dateFinObservation;
    protected $dateObservation;
    protected $listeMatricules;

    public function __construct() {
        
    }

    function getCodeEtablissement(): string {
        return $this->codeEtablissement;
    }

    function getDateFinObservation(): DateTime {
        return $this->dateFinObservation;
    }

    function getDateObservation(): DateTime {
        return $this->dateObservation;
    }

    function getListeMatricules(): array {
        return $this->listeMatricules;
    }

    function setCodeEtablissement(string $codeEtablissement) {
        $this->codeEtablissement = $codeEtablissement;
    }

    function setDateFinObservation(DateTime $dateFinObservation) {
        $this->dateFinObservation = $dateFinObservation;
    }

    function setDateObservation(DateTime $dateObservation) {
        $this->dateObservation = $dateObservation;
    }

    function setListeMatricules(array $listeMatricules) {
        $this->listeMatricules = $listeMatricules;
    }

}
