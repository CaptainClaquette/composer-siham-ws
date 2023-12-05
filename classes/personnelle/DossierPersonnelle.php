<?php

namespace hakuryo\sihamWSClient\personnelle;

use stdClass;

/**
 * Description of Dossier
 *
 * @author dere01
 */
class DossierPersonnelle
{

    public $donneesPersonnelles;
    public $adresses = [];
    public $diplomes = [];
    public $enfants = [];
    public $nationalites = [];
    public $numeroMails = [];

    public function __construct(stdClass $recupDonneesPersonnellesResponse = null)
    {
        if ($recupDonneesPersonnellesResponse != null) {
            $this->donneesPersonnelles = new DonneesPersonnelles($recupDonneesPersonnellesResponse->donneesPersonnelles);
            if (property_exists($recupDonneesPersonnellesResponse, "listeAdresses"))
                $this->init_attr($recupDonneesPersonnellesResponse, "listeAdresses", "adresses", Adresse::class);
            if (property_exists($recupDonneesPersonnellesResponse, "listeDiplomes"))
                $this->init_attr($recupDonneesPersonnellesResponse, "listeDiplomes", "diplomes", Diplome::class);
            if (property_exists($recupDonneesPersonnellesResponse, "listeNationalites"))
                $this->init_attr($recupDonneesPersonnellesResponse, "listeNationalites", "nationalites", Nationalite::class);
            if (property_exists($recupDonneesPersonnellesResponse, "listeNumerosMails"))
                $this->init_attr($recupDonneesPersonnellesResponse, "listeNumerosMails", "numeroMails", NumerosMails::class);
            if (property_exists($recupDonneesPersonnellesResponse, "listeEnfants"))
                $this->init_attr($recupDonneesPersonnellesResponse, "listeEnfants", "enfants", Enfant::class);
        }
    }

    public function get_mail_perso(): ?NumerosMails
    {
        foreach ($this->numeroMails as $value) {
            if ($value->getCodeTypologieNumeroMail() === "MPE") {
                return $value;
            }
        }
        return null;
    }

    public function get_mail_pro(): ?NumerosMails
    {
        foreach ($this->numeroMails as $value) {
            if ($value->getCodeTypologieNumeroMail() === "MPR") {
                return $value;
            }
        }
        return null;
    }

    public function get_tel_pro(): ?NumerosMails
    {
        foreach ($this->numeroMails as $value) {
            if ($value->getCodeTypologieNumeroMail() === "TPR") {
                return $value;
            }
        }
        return null;
    }

    public function get_portable_perso(): ?NumerosMails
    {
        foreach ($this->numeroMails as $value) {
            if ($value->getCodeTypologieNumeroMail() === "PPE") {
                return $value;
            }
        }
        return null;
    }

    public function has_mail_perso(): bool
    {
        foreach ($this->numeroMails as $numeroMail) {
            if ($numeroMail->getCodeTypologieNumeroMail() === "MPE") {
                return true;
            }
        }
        return false;
    }

    public function has_portable_perso(): bool
    {
        foreach ($this->numeroMails as $numeroMail) {
            if ($numeroMail->getCodeTypologieNumeroMail() === "PPE") {
                return true;
            }
        }
        return false;
    }

    private function init_attr($recupDonneesPersonnellesResponse, $fromAttr, $toAttr, $className)
    {
        if (is_array($recupDonneesPersonnellesResponse->$fromAttr)) {
            foreach ($recupDonneesPersonnellesResponse->$fromAttr as $adresse) {
                array_push($this->$toAttr, new $className($adresse));
            }
        } else {
            array_push($this->$toAttr, new $className($recupDonneesPersonnellesResponse->$fromAttr));
        }
    }

    public function __get($name)
    {
        if (method_exists($this, ($method = 'get_' . $name))) {
            return $this->$method();
        }
        return;
    }

    public function get_donneesPersonnelles(): DonneesPersonnelles
    {
        return $this->donneesPersonnelles;
    }

    public function set_mail_perso($mail)
    {
        $this->get_mail_perso()->setNumeroMail($mail);
    }

}
