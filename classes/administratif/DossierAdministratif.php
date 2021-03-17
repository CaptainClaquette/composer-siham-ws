<?php

namespace sihamWSClient\administratif;

use stdClass;

/**
 * Description of DossierAdministratif
 *
 * @author dere01
 */
class DossierAdministratif {

    public $absencesConges = [];
    public $affectations = [];
    public $carrieres = [];
    public $carrieresOrigines = [];
    public $contrats = [];
    public $modalitesServices = [];
    public $notations = [];
    public $PIP = [];
    public $positionsAdministratives = [];
    public $servicesValides = [];
    public $specialites = [];

    public function __construct(stdClass $class = null) {
        if ($class != null) {
            if (property_exists($class, "listeAbsencesConges"))
                $this->init_attr($class, "listeAbsencesConges", "absencesConges", AbsenceConge::class);
            if (property_exists($class, "listeAffectations"))
                $this->init_attr($class, "listeAffectations", "affectations", Affectation::class);
            if (property_exists($class, "listeCarrieres"))
                $this->init_attr($class, "listeCarrieres", "carrieres", Carriere::class);
            if (property_exists($class, "listeCarrieresOrigines"))
                $this->init_attr($class, "listeCarrieresOrigines", "carrieresOrigines", CarrieresOrigine::class);
            if (property_exists($class, "listeContrats"))
                $this->init_attr($class, "listeContrats", "contrats", Contrat::class);
            if (property_exists($class, "listeModalitesServices"))
                $this->init_attr($class, "listeModalitesServices", "modalitesServices", ModalitesService::class);
            if (property_exists($class, "listeNotations"))
                $this->init_attr($class, "listeNotations", "notations", Notation::class);
            if (property_exists($class, "listePIP"))
                $this->init_attr($class, "listePIP", "PIP", PIP::class);
            if (property_exists($class, "listePositionsAdministratives"))
                $this->init_attr($class, "listePositionsAdministratives", "positionsAdministratives", PositionsAdministrative::class);
            if (property_exists($class, "listeServicesValides"))
                $this->init_attr($class, "listeServicesValides", "servicesValides", ServicesValide::class);
            if (property_exists($class, "listeSpecialites"))
                $this->init_attr($class, "listeSpecialites", "specialites", Specialite::class);
        }
    }

    private function init_attr($recupDonneesPersonnellesResponse, $fromAttr, $toAttr, $className) {
        if (is_array($recupDonneesPersonnellesResponse->$fromAttr)) {
            foreach ($recupDonneesPersonnellesResponse->$fromAttr as $adresse) {
                array_push($this->$toAttr, new $className($adresse));
            }
        } else {
            array_push($this->$toAttr, new $className($recupDonneesPersonnellesResponse->$fromAttr));
        }
    }

}
