<?php

namespace sihamWSClient\traits;

use sihamWSClient\personnelle\DossierPersonnelle;
use sihamWSClient\personnelle\ParamListAgent;
use sihamWSClient\personnelle\ParamModifDP;
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

    public function modifDonneesPersonnelles($request_data)
    {
        try {
            $res = $this->client->ModifDonneesPersonnelles($request_data)->return->statutMAJ == '1';
            return $res;
        } catch (SoapFault $exception) {
            print_r($this->__getLastRequest());
            var_dump($exception);
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

        return $this->modifDonneesPersonnelles(["ParamModifDP" => $pdp]);
    }

    public function set_portable_perso($new_value, $matricule_siham, $typeAction = "M"): bool
    {
        $pdp = new ParamModifDP();
        $pdp->setTypeNumero("PPE");
        $pdp->setNumero($new_value);
        $pdp->setTypeAction($typeAction);
        $pdp->setMatricule($matricule_siham);
        $pdp->setCodeEtablissement($this->code_etablissement);

        return $this->modifDonneesPersonnelles(["ParamModifDP" => $pdp]);
    }
}
