<?php

namespace hakuryo\sihamWSClient\traits;

use hakuryo\sihamWSClient\personnelle\DossierPersonnelle;
use hakuryo\sihamWSClient\personnelle\ParamListAgent;
use hakuryo\sihamWSClient\personnelle\ParamModifDP;
use SoapFault;

trait DossierPersonnelOperations
{
    public function getDonneesPersonnelles(string $matricule_siham): DossierPersonnelle
    {
        $pla = new ParamListAgent();
        $pla->setCodeEtablissement($this->code_etablissement);
        $pla->setListeMatricules(["matricule" => "$matricule_siham"]);
        try {
            if (property_exists($this->recupDonneesPersonnelles(["ParamListAgent" => $pla]), 'return')) {
                $this->dossier = new DossierPersonnelle($this->RecupDonneesPersonnelles(["ParamListAgent" => $pla])->return);
            }
            return $this->dossier;
        } catch (SoapFault $exception) {
            print_r($this->__getLastRequest());
            var_dump($exception);
        }
    }

    public function updateDonneesPersonnelles($request_data)
    {
        try {
            $res = $this->ModifDonneesPersonnelles($request_data)->return->statutMAJ == '1';
            return $res;
        } catch (SoapFault $exception) {
            print_r($this->__getLastRequest());
            return false;
        }
    }

    public function set_mail_perso($new_value, $matricule_siham, $typeAction = "M"): bool
    {
        $pdp = new ParamModifDP();
        $pdp->setTypeNumero("MPE");
        $pdp->setNumero($new_value);
        $pdp->setTypeAction($typeAction);
        $pdp->setMatricule($matricule_siham);
        $pdp->setCodeEtablissement($this->code_etablissement);

        return $this->updateDonneesPersonnelles(["ParamModifDP" => $pdp]);
    }

    public function set_mail_pro($new_value, $matricule_siham, $typeAction = "M"): bool
    {
        $pdp = new ParamModifDP();
        $pdp->setTypeNumero("MPR");
        $pdp->setNumero($new_value);
        $pdp->setTypeAction($typeAction);
        $pdp->setMatricule($matricule_siham);
        $pdp->setCodeEtablissement($this->code_etablissement);

        return $this->updateDonneesPersonnelles(["ParamModifDP" => $pdp]);
    }

    public function set_portable_perso($new_value, $matricule_siham, $typeAction = "M"): bool
    {
        $pdp = new ParamModifDP();
        $pdp->setTypeNumero("PPE");
        $pdp->setNumero($new_value);
        $pdp->setTypeAction($typeAction);
        $pdp->setMatricule($matricule_siham);
        $pdp->setCodeEtablissement($this->code_etablissement);

        return $this->updateDonneesPersonnelles(["ParamModifDP" => $pdp]);
    }
}
