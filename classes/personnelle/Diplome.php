<?php

namespace sihamWSClient\personnelle;

use sihamWSClient\Utils;
use stdClass;

/**
 * Description of Diplome
 *
 * @author dere01
 */
class Diplome {

    public $codeEcoleDipome;
    public $codeEtablissement;
    public $codeTypeDiplome;
    public $commentDipl;
    public $dateObtentionDiplome;
    public $libCodeEcoleDiplome;
    public $libEcoleDiplome;
    public $libLongNiveauDiplome;
    public $libLongTypeDiplome;
    public $libOfficielDiplome;
    public $libSpecialiteDiplome;
    public $lieuDiplome;
    public $matricule;
    public $niveauDiplome;
    public $specialiteDiplome;
    public $statutDiplome;

    public function __construct(stdClass $class) {
        $attrs = array_keys(get_object_vars($class));
        foreach ($attrs as $attr) {
            switch ($attr) {
                case "dateObtentionDiplome":
                    $this->$attr = Utils::format_date($class->$attr);
                    break;
                default:
                    $this->$attr = $class->$attr;
            }
        }
    }

}
