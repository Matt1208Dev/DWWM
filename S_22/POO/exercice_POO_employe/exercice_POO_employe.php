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
        $nbAnnees = $date->diff($today);

        return $nbAnnees->format('%y');
    }

    public function CalculPrimeAnnuelle() 
    {
        $primeAnciennete = (($this->GetSalaire())*2/100) * $this->CalculAnciennete();
        $primeSalaire = $this->GetSalaire()*5/100;
        $totalPrimeAnnuelle = $primeAnciennete + $primeSalaire;
        $today = new DateTime('now');
        
        $today = $today->format('m-d');
        if ($today == '11-30')
        {
            echo 'L\'ordre de transfert d\'un montant de ' . $totalPrimeAnnuelle . 'K€ a été envoyé à
            la banque en faveur de ' . $this->_prenom . ' ' . $this->_nom . '.<br>';
        }
        else 
        {
            echo 'La prime de ' . $this->_prenom . ' ' . $this->_nom . ' s\'élève à ' . $totalPrimeAnnuelle . 'K€. Le versement interviendra au 30/11 de l\'année en cours.<br>';
        }

        return $totalPrimeAnnuelle;
    }

    // public function GetEmployeesList($Alphonse_Brown, $Chester_Bennington, $Tom_Morello, $Matthew_Bellamy, $Angus_Young) 
    // {
    //     $salaries = list($Alphonse_Brown, $Chester_Bennington, $Tom_Morello, $Matthew_Bellamy, $Angus_Young);
    //     return $salaries;
    // }

    public function GetNumberOfEmployees($salaries)
    {
        $number = count($salaries);

        return $number;
    }
}

// Création des objets tests
$Alphonse_Brown = new Employe('Brown', 'Alphonse', '01/11/2014', 'Commercial itinérant', 26, 'Commercial');
$Chester_Bennington = new Employe('Bennington', 'Chester', '15/06/2010', 'Community Manager', 31, 'Communication');
$Tom_Morello = new Employe('Morello', 'Tom', '08/04/2007', 'Responsable produit', 34, 'Marketing');
$Matthew_Bellamy = new Employe('Bellamy', 'Matthew', '18/02/2004', 'Directeur artistique', 39, 'Création');
$Angus_Young = new Employe('Young', 'Angus', '22/04/2001', 'Directeur financier', 41, 'Comptabilité');

// Affichage de la prime annuelle pour chaque employé
$Alphonse_Brown->CalculPrimeAnnuelle();
$Chester_Bennington->CalculPrimeAnnuelle();
$Tom_Morello->CalculPrimeAnnuelle();
$Matthew_Bellamy->CalculPrimeAnnuelle();
$Angus_Young->CalculPrimeAnnuelle();

$salaries = array($Alphonse_Brown, $Chester_Bennington, $Tom_Morello, $Matthew_Bellamy, $Angus_Young);
$nbEmployes = count($salaries);
asort($salaries);
foreach ($salaries as $key => $val) 
{
    echo $key . '=' . $val;
}
// list() = $reporting;
var_dump($salaries);
var_dump($nbEmployes);

?>