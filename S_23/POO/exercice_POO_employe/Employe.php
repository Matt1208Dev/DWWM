<?php

// Création de la classe Employe
class Employe
{
    protected $_nom;
    protected $_prenom;
    protected $_anciennete;
    protected $_fonction;
    protected $_salaire;
    protected $_service;
    protected $_agence;
    protected $_enfant;

    public function __construct($nom, $prenom, $anciennete, $fonction, $salaire, $service, $agence, $enfant)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAnciennete($anciennete);
        $this->setFonction($fonction);
        $this->setSalaire($salaire);
        $this->setService($service);
        $this->setAgence($agence);
        $this->setEnfant($enfant);
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

    public function setAgence($agence)
    {
        $this->_agence = $agence;
    }

    public function setEnfant($enfant)
    {
        if ((is_array($enfant)) || (is_int($enfant)) || $enfant == null)
        {
            $this->_enfant = $enfant;  
        }
        else
        {
            trigger_error('$enfant doit être uniquement un nombre ou un tableau de nombres', E_USER_WARNING);
            return;
        }
        
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

    public function GetEnfant() 
    {
        return $this->_enfant;
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
            la banque en faveur de ' . $this->GetPrenom() . ' ' . $this->GetNom() . '.<br>';
        }
        else 
        {
            echo 'La prime de ' . $this->GetPrenom() . ' ' . $this->GetNom() . ' s\'élève à ' . $totalPrimeAnnuelle . 'K€. Le versement interviendra au 30/11 de l\'année en cours.<br>';
        }

        return $totalPrimeAnnuelle;
    }

    public function getNomAgence()
    {
        return $this->_agence->getNomAgence();
    }

    public function getRestauration()
    {
        return $this->_agence->getRestauration();
    }

    // Affichage de l'agence et du mode de restauration de l'employé
    public function getAgenceRestau()
    {
        echo $this->GetPrenom() . ' ' . $this->GetNom() . ' appartient à l\'' . $this->getNomAgence() . ' dont le mode de restauration est : ' . $this->getRestauration() . '.<br><br>';
    }

    // Eligibilité aux chèques Vacances
    public function chequeVacances() 
    {
        $eligib = $this->CalculAnciennete();
        if ($eligib >= 1) {

            echo "$this->_prenom $this->_nom est éligible aux chèques vacances.<br><br>";
            return true;
        }
        else
        {
            echo "$this->_prenom $this->_nom n'est pas éligible aux chèques vacances.<br><br>";
            return false;
        }
    }

    public function chequesNoel()
    {
        $ageEnfants = $this->GetEnfant();
        if ($ageEnfants == null) 
        {
            echo "$this->_prenom $this->_nom n'est pas éligible aux chèques Noël.<br><br>";
        }
        else if (is_int($ageEnfants))
        {
            if ($ageEnfants >= 0 && $ageEnfants <= 10)
            {
                $vingtEuros = 1;
                echo "$this->_prenom $this->_nom percevra un chèque Noël de 20 euros.<br><br>";
                return $vingtEuros;
            }
            else if ($ageEnfants >= 11 && $ageEnfants <= 15)
            {
                $trenteEuros = 1;
                echo "$this->_prenom $this->_nom percevra un chèque Noël de 30 euros.<br><br>";
                return $trenteEuros;
            }
            else if ($ageEnfants >= 16 && $ageEnfants <= 18)
            {
                $cinquanteEuros = 1;
                echo "$this->_prenom $this->_nom percevra un chèque Noël de 50 euros.<br><br>";
                return $cinquanteEuros;
            }
            else 
            {
                echo "L'enfant d'$this->_prenom $this->_nom ne répond pas aux critère d'amission des chèques Noël.<br><br>";
            }
        }
        else if (is_array($ageEnfants))
        {
            $vingtEuros = 0;
            $trenteEuros = 0;
            $cinquanteEuros = 0;
            $result = "$this->_prenom $this->_nom percevra : <br>";
            foreach($ageEnfants as $key=>$value)
            {
                if ($value >= 0 && $value <= 10)
            {
                $vingtEuros = $vingtEuros + 1;
            }
            else if ($value >= 11 && $value <= 15)
            {
                $trenteEuros = $trenteEuros + 1;
            }
            else if ($value >= 16 && $value <= 18)
            {
                $cinquanteEuros= $cinquanteEuros + 1;
            }
                $array = array($vingtEuros, $trenteEuros, $cinquanteEuros);
            }
            
            if ($array[0] > 0)
            {
                $result .= "$array[0] chèque(s) Noël de 20 euros<br>";
            }
            if ($array[1] > 0)
            {
                $result .= "$array[1] chèque(s) Noël de 30 euros<br>";
            }
            if ($array[2] > 0)
            {
                $result .= "$array[2] chèque(s) Noël de 50 euros<br><br>";
            }
            $result .= "<br>";
            echo $result;
            // echo "$this->_prenom $this->_nom percevra : <br> $array[0] chèque(s) Noël de 20 euros<br> $array[1] chèque(s) Noël de 30 euros<br> et $array[2] chèque(s) Noël de 50 euros<br> ";    
        
        }
    }
}

?>