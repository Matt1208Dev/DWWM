<?php

class Panier extends CI_Controller
{
    public function ajouterPanier() 
    {
        // On récupère les données du formulaire 
        $aData = $this->input->post();  

        // Au 1er article ajouté, création du panier car il n'existe pas
        if ($this->session->panier == null) 
        {
            // On créé un tableau pour stocker les informations du produit  
            $aPanier = array();

            // On ajoute les infos du produit ($aData) au tableau du panier ($aPanier) 
            array_push($aPanier, $aData);  

            // On stocke le panier dans une variable de session nommée 'panier'            
            $this->session->set_userdata("panier", $aPanier);

            // On redirige sur la liste
            redirect("produits/liste"); 
        }
        else
        { // le panier existe (on a déjà mis au moins un article) 

            // On récupère le contenu du panier en session           
            $aPanier = $this->session->panier;

            $pro_id = $this->input->post('pro_id');

            $bSortie = FALSE;

            // on cherche si le produit existe déjà dans le panier
            foreach ($aPanier as $produit) 
            {
                if ($produit['pro_id'] == $pro_id)
                {
                    $bSortie = TRUE;
                }
            }

            if ($bSortie) 
            { // si le produit est déjà dans le panier, l'utilisateur est averti
                echo '<div class="alert alert-danger">Ce produit est déjà dans le panier.</div>';

                // On redirige sur la liste
                redirect("produits/liste");
            }
            else 
            { // sinon, le produit est ajouté dans le panier
                array_push($aPanier, $aData);

                // On remet le tableau des produitss que  
                $this->session->panier = $aPanier;
                // $this->load->view('produits/liste', $aView);

                // On redirige sur la liste
                redirect("produits/liste");
            }
        }
    }

    public function afficherPanier()
    {
        // $aPanier = $this->session->panier;
        // $aView['panier'] = $aPanier;

        $this->load->view('header');
        $this->load->view('panier');
        $this->load->view('footer');
    }

    public function supprimerPanier()
    {
        $this->session->sess_destroy();

        // On redirige sur la liste
        redirect("produits/liste");
    }

    public function modifierQuantite()
    {
    $aPanier = $this->session->panier;
    $aNew = $this->input->post();
    var_dump($aPanier);
    var_dump($aNew);
    $aTemp = array(); //création d'un tableau temporaire vide

    // On parcourt le tableau produit après produit
    for ($i = 0; $i < count($aPanier); $i++) 
    {
        if ($aPanier[$i]['pro_id'] == $aNew['pro_id'])
        {
            if ($aPanier[$i]['pro_qte'] != $aNew['pro_qte'])
            
            array_push($aTemp, $aNew);
        }
        else
        {
            array_push($aTemp, $aPanier[$i]);
        }
    }

    $aPanier = $aTemp;
    unset($aTemp);
    $this->session->set_userdata("panier", $aPanier);

    // On réaffiche le panier 
    redirect("panier/afficherPanier");
    }

    public function supprimerProduit()
    {
        $aPanier = $this->session->panier;
        $pro_id = $this->input->post('pro_id');

        $aTemp = array(); //création d'un tableau temporaire vide

        for ($i=0; $i<count($aPanier); $i++) //on cherche dans le panier les produits à ne pas supprimer
        {
            if ($aPanier[$i]['pro_id'] !== $pro_id)
            {
                array_push($aTemp, $aPanier[$i]); // ces produits sont ajoutés dans le tableau temporaire
            }
        }

    $aPanier = $aTemp;
    unset($aTemp);
    $this->session->set_userdata("panier", $aPanier); // le panier prend la valeur du tableau temporaire et ne contient donc plus le produit à supprimer

    // On réaffiche le panier 
    redirect("panier/afficherPanier");
    }
}