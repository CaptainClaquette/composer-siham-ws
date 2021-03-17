<?php

namespace hakuryo\sihamWSClient\personnelle;

use DateTime;

/**
 * Description of ParamModifDP
 *
 * @author dere01
 */
class ParamModifDP {

    private $bisTer;
    private $codeEtablissement;
    private $codePays;
    private $codePostal;
    private $codeUOAffectAdresse;
    private $complementAdresse;
    private $dateDebut;
    private $dateFin;
    private $matricule;
    private $natureVoie;
    private $noVoie;
    private $nomVoie;
    private $numero;
    private $pourcentageAffectation;
    private $typeAction;
    private $typeAdrPers;
    private $typeNumero;
    private $ville;

    public function __construct() {
        
    }

    function getBisTer() {
        return $this->bisTer;
    }

    function getCodeEtablissement() {
        return $this->codeEtablissement;
    }

    function getCodePays() {
        return $this->codePays;
    }

    function getCodePostal() {
        return $this->codePostal;
    }

    function getCodeUOAffectAdresse() {
        return $this->codeUOAffectAdresse;
    }

    function getComplementAdresse() {
        return $this->complementAdresse;
    }

    function getDateDebut() {
        return $this->dateDebut;
    }

    function getDateFin() {
        return $this->dateFin;
    }

    function getMatricule() {
        return $this->matricule;
    }

    function getNatureVoie() {
        return $this->natureVoie;
    }

    function getNoVoie() {
        return $this->noVoie;
    }

    function getNomVoie() {
        return $this->nomVoie;
    }

    function getNumero() {
        return $this->numero;
    }

    function getPourcentageAffectation() {
        return $this->pourcentageAffectation;
    }

    function getTypeAction() {
        return $this->typeAction;
    }

    function getTypeAdrPers() {
        return $this->typeAdrPers;
    }

    function getTypeNumero() {
        return $this->typeNumero;
    }

    function getVille() {
        return $this->ville;
    }

    function setBisTer(string $bisTer) {
        $this->bisTer = $bisTer;
    }

    function setCodeEtablissement(string $codeEtablissement) {
        $this->codeEtablissement = $codeEtablissement;
    }

    function setCodePays(string $codePays) {
        $this->codePays = $codePays;
    }

    function setCodePostal(string $codePostal) {
        $this->codePostal = $codePostal;
    }

    function setCodeUOAffectAdresse(string $codeUOAffectAdresse) {
        $this->codeUOAffectAdresse = $codeUOAffectAdresse;
    }

    function setComplementAdresse(string $complementAdresse) {
        $this->complementAdresse = $complementAdresse;
    }

    function setDateDebut(DateTime $dateDebut) {
        $this->dateDebut = $dateDebut;
    }

    function setDateFin(DateTime $dateFin) {
        $this->dateFin = $dateFin;
    }

    function setMatricule(string $matricule) {
        $this->matricule = $matricule;
    }

    function setNatureVoie(string $natureVoie) {
        $this->natureVoie = $natureVoie;
    }

    function setNoVoie(string $noVoie) {
        $this->noVoie = $noVoie;
    }

    function setNomVoie(string $nomVoie) {
        $this->nomVoie = $nomVoie;
    }

    function setNumero(string $numero) {
        $this->numero = $numero;
    }

    function setPourcentageAffectation(int $pourcentageAffectation) {
        $this->pourcentageAffectation = $pourcentageAffectation;
    }

    function setTypeAction(string $typeAction) {
        $this->typeAction = $typeAction;
    }

    function setTypeAdrPers(string $typeAdrPers) {
        $this->typeAdrPers = $typeAdrPers;
    }

    function setTypeNumero(string $typeNumero) {
        $this->typeNumero = $typeNumero;
    }

    function setVille(string $ville) {
        $this->ville = $ville;
    }

}
