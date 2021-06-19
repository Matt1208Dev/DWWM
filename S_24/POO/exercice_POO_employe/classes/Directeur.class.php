<?php 

// Création de la classe Directeur
class Directeur extends Employe {

    public function CalculerPrime() 
    {
        $primeAnciennete = (($this->getSalaire())*3/100) * $this->getAnciennete();
        $primeSalaire = $this->getSalaire()*7/100;
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

}

?>