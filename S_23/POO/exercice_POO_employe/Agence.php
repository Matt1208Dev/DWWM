
<?php

// Création de la classe Agence
class Agence 
{
    
    protected $_idAgence;
    protected $_nomAgence;
    protected $_adresseAgence;
    protected $_codePostalAgence;
    protected $_villeAgence;
    protected $_restauration;

    public function __construct($idAgence, $nomAgence, $adresseAgence, $codePostalAgence, $villeAgence, $restauration)
    {
        $this->setidAgence($idAgence);
        $this->setNomAgence($nomAgence);
        $this->setAdresseAgence($adresseAgence);
        $this->setCodePostalAgence($codePostalAgence);
        $this->setVilleAgence($villeAgence);
        $this->setRestauration($restauration);
    }

    public function getNomAgence() 
    {
        return $this->_nomAgence;
    }

    public function getAdresseAgence() 
    {
        return $this->_adresseAgence;
    }

    public function getCodePostalAgence() 
    {
        return $this->_codePostalAgence;
    }

    public function getVilleAgence() 
    {
        return $this->_villeAgence;
    }

    public function getRestauration() 
    {
        return $this->_restauration;
    }

    public function setidAgence($idAgence)
    {
        if (!is_int($idAgence))
        {
            trigger_error('L\'id agence doit être un entier', E_USER_WARNING);
            return;
        }

        $this->_idAgence = $idAgence;
    }

    public function setNomAgence($nomAgence)
    {
        if (!is_string($nomAgence))
        {
            trigger_error('Le nom doit être une string', E_USER_WARNING);
            return;
        }

        $this->_nomAgence = $nomAgence;
    }

    public function setAdresseAgence($adresseAgence)
    {
        if (!is_string($adresseAgence))
        {
            trigger_error('L\'adresse doit être une string', E_USER_WARNING);
            return;
        }

        $this->_adresseAgence = $adresseAgence;
    }

    public function setCodePostalAgence($codePostalAgence)
    {
        if (!is_int($codePostalAgence))
        {
            trigger_error('Le code postal doit être un entier', E_USER_WARNING);
            return;
        }

        $this->_codePostalAgence = $codePostalAgence;
    }

    public function setVilleAgence($villeAgence)
    {
        if (!is_string($villeAgence))
        {
            trigger_error('La ville doit être une string', E_USER_WARNING);
            return;
        }

        $this->_villeAgence = $villeAgence;
    }

    public function setRestauration($restauration)
    {
        if (!is_string($restauration))
        {
            trigger_error('Le mode de restauration doit être une string', E_USER_WARNING);
            return;
        }

        $this->_restauration = $restauration;
    }

    
}

?>