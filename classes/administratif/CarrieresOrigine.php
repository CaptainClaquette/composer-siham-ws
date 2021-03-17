<?php

namespace hakuryo\sihamWSClient\administratif;

use hakuryo\sihamWSClient\Utils;
use stdClass;

/**
 * Description of CarrieresOrigine
 *
 * @author dere01
 */
class CarrieresOrigine {

    private $categorieFP;
    private $codeCorpsOrigine;
    private $codeEchelonOrigine;
    private $codeGradeOrigine;
    private $codeOrganismeOrigine;
    private $dateDebut;
    private $dateEntreeCorps;
    private $dateEntreeGrade;
    private $dateFin;
    private $libCourtCorpsOrigine;
    private $libLongAutreOrganisme;
    private $libLongCorpsOrigine;
    private $libLongEtabOrigine;
    private $libLongGradeOrigine;
    private $libLongOrganismeOrigine;
    private $libLongStatutOrigine;
    private $statutOrigine;
    private $temoinRemAcc;

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
