<?php 

class Personnage {

    private $_nom;
    private $_prenom;
    private $_age;
    private $_sexe;

    public function getNom()
    {
        return $this->_nom;
    }

    public function setNom($nom)
    {
        $this->_nom = $nom;
        return $this->_nom;
    }

    public function getPrenom()
    {
        return $this->_prenom;
    }

    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
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

    public function setSexe($sexe)
    {
        $this->_sexe = $sexe;
        return $this->_sexe;
    }
}

?>