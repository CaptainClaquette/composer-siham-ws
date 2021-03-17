<?php

namespace hakuryo\sihamWSClient\traits;

use hakuryo\sihamWSClient\administratif\DossierAdministratif;
use hakuryo\sihamWSClient\personnelle\ParamListAgent;
use SoapFault;

trait DossierAdministratifOperations
{
    public function getDonneesAdministratives(string $matricule_siham)
    {
        $pla = new ParamListAgent();
        $pla->setCodeEtablissement($this->code_etablissement);
        $pla->setListeMatricules(["matricule" => "$matricule_siham"]);

        try {
            if (property_exists($this->RecupDonneesAdministratives(["ParamListAgent" => $pla]), 'return')) {
                return new DossierAdministratif($this->RecupDonneesAdministratives(["ParamListAgent" => $pla])->return);
            }
            return null;
        } catch (SoapFault $exception) {
            print_r($this->__getLastRequest());
            var_dump($exception);
        }
    }
}
