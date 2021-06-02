<?php

class Employe 
{
    public $_nom;
    public $_prenom;
    public $_anciennete;
    public $_fonction;
    public $_salaire;
    public $_service;

    public function __construct($nom, $prenom, $anciennete, $fonction, $salaire, $service)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAnciennete($anciennete);
        $this->setFonction($fonction);
        $this->setSalaire($salaire);
        $this->setService($service);
    }

    public function setNom($nom)
    {
        if (!is_string($nom))
        {
            trigger_error('Le nom doit être une string', E_USER_WARNING);
            return;
        }

        $this->_nom = $nom;
    }

    public function setPrenom($prenom)
    {
        if (!is_string($prenom))
        {
            trigger_error('Le prénom doit être une string', E_USER_WARNING);
            return;
        }

        $this->_prenom = $prenom;
    }

    public function setAnciennete($anciennete)
    {
        if (!is_string($anciennete))
        {
            trigger_error('L\'anciennete doit être une date au format \'JJ/MM/AA\'', E_USER_WARNING);
            return;
        }

        $this->_anciennete = $anciennete;
    }

    public function setFonction($fonction)
    {
        if (!is_string($fonction))
        {
            trigger_error('La fonction doit être une string', E_USER_WARNING);
            return;
        }

        $this->_fonction = $fonction;
    }

    public function setSalaire($salaire)
    {
        if (!is_float($salaire))
        {
            if(!is_int($salaire))
            {
                trigger_error('Le salaire doit être un nombre (entier ou decimal) exprimé en K€', E_USER_WARNING);
                return;
            }
        }

        $this->_salaire = $salaire;
    }

    public function setService($service)
    {
        if (!is_string($service))
        {
            trigger_error('Le service doit être une string', E_USER_WARNING);
            return;
        }

        $this->_service = $service;
    }

    public function GetNom() 
    {
        return $this->_nom;
    }

    public function GetPrenom() 
    {
        return $this->_prenom;
    }

    public function GetAnciennete() 
    {
        return $this->_anciennete;
    }

    public function GetFonction() 
    {
        return $this->_fonction;
    }

    public function GetSalaire() 
    {
        return $this->_salaire;
    }

    public function GetService() 
    {
        return $this->_service;
    }

    public function CalculAnciennete() 
    {
        $date = DateTime::createFromFormat('d/m/Y', $this->GetAnciennete());
        $date->format('Y-m-d');
        $today = new DateTime('now');
        $today->format('Y-m-d');
        $nbAnnees = $date->diff($today);

        return $nbAnnees->format('%y');
    }

    public function CalculPrimeAnnuelle() 
    {
        $primeAnciennete = (($this->GetSalaire())*2/100) * $this->CalculAnciennete();
        $primeSalaire = $this->GetSalaire()*5/100;
        var_dump($primeAnciennete);
        var_dump($primeSalaire);
        $totalPrimeAnnuelle = $primeAnciennete + $primeSalaire;
        return $totalPrimeAnnuelle;
    }
}

$Alphonse_brown = new Employe('Brown', 'Alphonse', '01/01/2016', 'Commercial itinérant', 26, 'Commercial');

// echo $Alphonse_brown->CalculAnciennete();
echo "Total Prime Annuelle pour : " . $Alphonse_brown->GetPrenom() . " " . $Alphonse_brown->GetNom () . " : " . $Alphonse_brown->CalculPrimeAnnuelle() . " K€.";

?>