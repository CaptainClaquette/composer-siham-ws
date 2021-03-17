<?php

namespace hakuryo\sihamWSClient\personnelle;

use hakuryo\sihamWSClient\Utils;
use stdClass;

/**
 * Description of DonneesPersonnelles
 *
 * @author dere01
 */
class DonneesPersonnelles {

    public $agenceCoordBanc;
    public $bisTerAdresse;
    public $bureauDistributeurAdresse;
    public $civilite;
    public $codeAdministration;
    public $codeBanqueCoordBanc;
    public $codeDepartementAdresse;
    public $codeEtablissement;
    public $codePaysAdresseUO;
    public $codePaysCoordBanc;
    public $codePostalAdresseUO;
    public $codeSituationFamVigueur;
    public $codeUO;
    public $communeAdresseUO;
    public $complementAdresse;
    public $dateDeces;
    public $dateNaissance;
    public $IBAN1CoordBanc;
    public $IBAN2CoordBanc;
    public $IBAN3CoordBanc;
    public $IBAN4CoordBanc;
    public $IBAN5CoordBanc;
    public $IBAN6CoordBanc;
    public $IBAN7CoordBanc;
    public $IBAN8CoordBanc;
    public $IBAN9CoordBanc;
    public $libLongCivilite;
    public $libLongDepartementAdresse;
    public $libLongPaysAdresseUO;
    public $libLongPaysNaissance;
    public $libLongSituationFamVigueur;
    public $localisationCoordBanc;
    public $matricule;
    public $noVoieAdresseUO;
    public $nomPatronymique;
    public $nomUsuel;
    public $nomVoieAdresse;
    public $numDossierHarpege;
    public $numen;
    public $numeroInseeDefinitif;
    public $numeroInseeProv;
    public $paysNaissance;
    public $prenom;
    public $typeAdresseUO;
    public $typeBanqueCoordBanc;
    public $villeNaissance;

    public function __construct(stdClass $donneesPersonnelles) {
        /**
         * Info bancaire
         */
        $attrs = array_keys(get_object_vars($donneesPersonnelles));

        foreach ($attrs as $attr) {

            switch ($attr) {
                case "dateNaissance":
                    $this->$attr = Utils::format_date($donneesPersonnelles->$attr);
                    break;
                default:
                    $this->$attr = $donneesPersonnelles->$attr;
            }
        }
    }

    public function get_full_iban() {
        return $this->IBAN1CoordBanc . " "
                . $this->IBAN2CoordBanc . " "
                . $this->IBAN3CoordBanc . " "
                . $this->IBAN4CoordBanc . " "
                . $this->IBAN5CoordBanc . " "
                . $this->IBAN6CoordBanc . " "
                . $this->IBAN7CoordBanc . " "
                . $this->IBAN8CoordBanc . " "
                . $this->IBAN9CoordBanc;
    }

}
