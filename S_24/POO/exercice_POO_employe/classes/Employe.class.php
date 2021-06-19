<?php

// Création de la classe Employe
class Employe extends Agence
{
    private $_nom;
    private $_prenom;
    private $_dateEmbauche;
    private $_fonction;
    private $_salaire;
    private $_service;
    private $_agence;
    private $_enfant;

    // public function __construct($nom, $prenom, $anciennete, $fonction, $salaire, $service, $agence, $enfant)
    // {
    //     $this->setNom($nom);
    //     $this->setPrenom($prenom);
    //     $this->setDateEmbauche($anciennete);
    //     $this->setFonction($fonction);
    //     $this->setSalaire($salaire);
    //     $this->setService($service);
    //     $this->setAgence($agence);
    //     $this->setEnfant($enfant);
    // }

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

    public function setDateEmbauche($anciennete)
    {
        if (!is_string($anciennete))
        {
            trigger_error('L\'anciennete doit être une date au format \'JJ/MM/AA\'', E_USER_WARNING);
            return;
        }

        $this->_dateEmbauche = DateTime::createFromFormat("d/m/Y", $anciennete);
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
        // if (!is_int($salaire))
        // {
        //     trigger_error('Le salaire doit être un entier (exprimé en K€)', E_USER_WARNING);
        //     return;
        
        // }

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

    public function getNom() 
    {
        return $this->_nom;
    }

    public function getPrenom() 
    {
        return $this->_prenom;
    }

    public function getDateEmbauche() 
    {
        return $this->_dateEmbauche;
    }

    public function getFonction() 
    {
        return $this->_fonction;
    }

    public function getSalaire() 
    {
        return $this->_salaire;
    }

    public function getService() 
    {
        return $this->_service;
    }

    public function getEnfant() 
    {
        return $this->_enfant;
    }

    public function getAnciennete() 
    {
        $date = $this->_dateEmbauche;
        $date -> format('Y-m-d');
        $today = new DateTime('now');
        $nbAnnees = $date->diff($today);

        return $nbAnnees->format('%y');
    }

    public function CalculerPrime() 
    {
        $primeAnciennete = (($this->getSalaire())*2/100) * $this->getAnciennete();
        $primeSalaire = $this->getSalaire()*5/100;
        $totalPrimeAnnuelle = $primeAnciennete + $primeSalaire;
        $today = new DateTime('now');
        
        $today = $today->format('m-d');
        if ($today == '11-30')
        {
            echo 'L\'ordre de transfert d\'un montant de ' . $totalPrimeAnnuelle . 'K€ a été envoyé à
            la banque en faveur de ' . $this->getPrenom() . ' ' . $this->getNom() . '.<br>';
        }
        else 
        {
            echo 'La prime de ' . $this->getPrenom() . ' ' . $this->getNom() . ' s\'élève à ' . $totalPrimeAnnuelle . 'K€. Le versement interviendra au 30/11 de l\'année en cours.<br>';
        }

        return $totalPrimeAnnuelle;
    }

    public function getAgence()
    {
        return $this->_agence;
    }

    public function getModeRestauration()
    {
        return $this->_agence->getModeRestauration();
    }

    // Eligibilité aux chèques Vacances
    public function isChequeVacance() 
    {
        $eligib = $this->getAnciennete();
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
        $ageEnfants = $this->getEnfant();
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
