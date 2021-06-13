<?php

class PersonnageDefault {

    private $_nom = 'Loper';
    private $_prenom = 'Dave';
    private $_age = 18;
    private $_sexe = 'Masculin';

    public function getNom()
    {
        return $this->_nom;
    }

    public function setNom()
    {
        $this->_nom = 'Rosoft';
        return $this->_nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function setPrenom($prenom)
    {
        $this->_prenom = 'Mike';
        return $this->_prenom;
    }

    public function getAge()
    {
        return $this->_age;
    }

    public function setAge($age)
    {
        $this->_age = $age;
        return $this->_age;
    }

    public function getSexe()
    {
        return $this->_sexe;
    }

    public function setSexe()
    {
        $this->_sexe = 'Féminin';
        return $this->_sexe;
    }
}

?>