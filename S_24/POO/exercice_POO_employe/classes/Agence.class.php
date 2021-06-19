
<?php

// Création de la classe Agence
class Agence
{

    private $_nom;
    private $_adresse;
    private $_codePostal;
    private $_ville;
    private $_restauration;

    // public function __construct($nomAgence, $adresseAgence, $codePostalAgence, $villeAgence, $restauration)
    // {
    //     $this->setNom($nomAgence);
    //     $this->setAdresse($adresseAgence);
    //     $this->setCodePostal($codePostalAgence);
    //     $this->setVille($villeAgence);
    //     $this->setRestauration($restauration);
    // }

    public function getNom()
    {
        return $this->_nom;
    }

    public function getAdresse()
    {
        return $this->_adresse;
    }

    public function getCodePostal()
    {
        return $this->_codePostal;
    }

    public function getVille()
    {
        return $this->_ville;
    }

    public function getModeRestauration()
    {
        return $this->_restauration;
    }

    public function setNom($nom)
    {
        if (!is_string($nom)) {
            trigger_error('Le nom doit être une string', E_USER_WARNING);
            return;
        }

        $this->_nom = $nom;
    }

    public function setAdresse($adresse)
    {
        if (!is_string($adresse)) {
            trigger_error('L\'adresse doit être une string', E_USER_WARNING);
            return;
        }

        $this->_adresse = $adresse;
    }

    public function setCodePostal($codePostal)
    {
        if (!is_string($codePostal)) {
            trigger_error('Le code postal doit être au format "string"', E_USER_WARNING);
            return;
        }

        $this->_codePostal = $codePostal;
    }

    public function setVille($ville)
    {
        if (!is_string($ville)) {
            trigger_error('La ville doit être une string', E_USER_WARNING);
            return;
        }

        $this->_ville = $ville;
    }

    public function setModeRestauration($restauration)
    {
        if (!is_bool($restauration)) {
            trigger_error('Le mode de restauration doit être un booléen', E_USER_WARNING);
            return;
        }

        $this->_restauration = $restauration;
    }
}

?>