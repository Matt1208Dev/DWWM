<?php
// application/controllers/Produits.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produits extends CI_Controller 
{

    public function liste()
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('produitsModel');

        // Appel de la méthode liste() dans produitsModel, récupération du tableau de résultat dans $aliste
        $aListe = $this->produitsModel->liste();

        $aView["liste"] = $aListe;

        // Appel de la vue avec transmission du tableau
        $this->load->view('header'); 
        $this->load->view('liste', $aView);
        $this->load->view('footer');   
    }



    public function ajouter()
    {
        // // Chargement des assistants 'form' et 'url'
        // $this->load->helper('form', 'url'); 

        // // Chargement de la librairie 'database'
        // $this->load->database(); 

        // // Chargement de la librairie form_validation
        // $this->load->library('form_validation'); 

        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire

            $data = $this->input->post();

        // Définition des filtres
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger mt-2 fw-bold">', '</div>'); 
        $this->form_validation->set_rules("pro_ref", "Référence", "required|regex_match[/[0-9a-zA-Zéèàêëäï\\-\\ ]{1,50}/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "Merci de saisir la référence sans caractère spéciaux (limite 50 caractères)."));
        $this->form_validation->set_rules("pro_cat_id", "Catégorie", "required", array("required" => "Le choix d'une %s est obligatoire."));
        $this->form_validation->set_rules("pro_libelle", "Libellé", "required|regex_match[/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "Merci de saisir le libellé sans caractère spéciaux (limite 50 caractères)."));
        $this->form_validation->set_rules("pro_description", "Description", "regex_match[/[0-9]*[a-zA-Z0-9éèàêëäï\\-\\ ]{1,200}/]", array("required" => "Merci de respecter la limite de 200 caractères et e pas utiliser de caractères spéciaux."));
        $this->form_validation->set_rules("pro_prix", "Prix", "required|regex_match[/[0-9]{1,5}[.][0-9]{2}/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "Merci de saisir le prix au bon format.")); 
        $this->form_validation->set_rules("pro_stock", "Stock", "required|regex_match[/[0-9]{1,5}/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "Entrez la quantité en %s uniquement en nombres entiers."));
        $this->form_validation->set_rules("pro_couleur", "Couleur", "required|regex_match[/[a-zA-Zéèàêëäï\\-\\ ]{1,20}/]", array("required" => "Saisir la %s."));


            if ($this->form_validation->run() == FALSE)
            { // Echec de la validation, on réaffiche la vue formulaire 

                $this->load->view('header');
                $this->load->view('add_form');
                $this->load->view('footer');
            }
            else
            { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base

                $this->load->model('produitsModel');
                $this->produitsModel->insertProduct($data);

                redirect("produits/liste");
            }
        }
        else 
        { // 1er appel de la page: affichage du formulaire
            $this->load->view('header');
            $this->load->view('add_form');
            $this->load->view('footer');
        }
    } // -- ajouter()




    public function modifier($id)
    {
        // // Chargement des assistants 'form' et 'url'
        // $this->load->helper('form', 'url', 'date'); 

        // // Chargement de la librairie 'database'
        // $this->load->database();  

        // // Chargement de la librairie form_validation
        // $this->load->library('form_validation'); 

        // Requête de sélection de l'enregistrement souhaité 
        $this->load->model('produitsModel');
        $produit = $this->produitsModel->ProductDetails($id);
        $aView["produit"] = $produit[0];

        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire

        $data = $this->input->post();

        // Définition des filtres
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger mt-2 fw-bold">', '</div>'); 
        $this->form_validation->set_rules("pro_ref", "Référence", "required|regex_match[/[0-9a-zA-Zéèàêëäï\\-\\ ]{1,50}/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "Merci de saisir la référence sans caractère spéciaux (limite 50 caractères)."));
        $this->form_validation->set_rules("pro_cat_id", "Catégorie", "required", array("required" => "Le choix d'une %s est obligatoire."));
        $this->form_validation->set_rules("pro_libelle", "Libellé", "required|regex_match[/[a-zA-Zéèàêëäï\\-\\ ]{1,50}/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "Merci de saisir le libellé sans caractère spéciaux (limite 50 caractères)."));
        $this->form_validation->set_rules("pro_description", "Description", "regex_match[/[0-9]*[a-zA-Z0-9éèàêëäï\\-\\ ]{1,200}/]", array("required" => "Merci de respecter la limite de 200 caractères et e pas utiliser de caractères spéciaux."));
        $this->form_validation->set_rules("pro_prix", "Prix", "required|regex_match[/[0-9]{1,5}[.][0-9]{2}/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "Merci de saisir le prix au bon format.")); 
        $this->form_validation->set_rules("pro_stock", "Stock", "required|regex_match[/[0-9]{1,5}/]", array("required" => "Le champ %s est obligatoire.", "regex_match" => "Entrez la quantité en %s uniquement en nombres entiers."));
        $this->form_validation->set_rules("pro_couleur", "Couleur", "required|regex_match[/[a-zA-Zéèàêëäï\\-\\ ]{1,20}/]", array("required" => "Saisir la %s."));

        if ($this->form_validation->run() == FALSE)
        { // Echec de la validation, on réaffiche la vue formulaire
            $this->load->view('header'); 
            $this->load->view('update_form', $aView);
            $this->load->view('footer');
        }
        else
        { // La validation a réussi, nos valeurs sont bonnes, on peut modifier en base  
            
            $this->load->model('produitsModel');
            $this->produitsModel->UpdateProduct($id, $data);
            $this->produitsModel->UpdateProductLastModifDate($id);

            redirect("produits/liste");
        }
        } 
        else 
        { // 1er appel de la page: affichage du formulaire 
        $this->load->view('header');            
        $this->load->view('update_form', $aView);
        $this->load->view('footer');
        }
    } // -- modifier()



    public function supprimer($id)
    {
        // Chargement des assistants 'form' et 'url'
        $this->load->helper('form', 'url'); 

        // // Chargement de la librairie 'database'
        // $this->load->database(); 
        
        // // Chargement de la librairie form_validation
        // $this->load->library('form_validation'); 

        // Requête de sélection de l'enregistrement souhaité
        
        $this->load->model('produitsModel');
        $produit = $this->produitsModel->ProductDetails($id);
        $aView["produit"] = $produit[0];

        // // Définition des filtres
        // $this->form_validation->set_error_delimiters('<div class="alert alert-danger mt-2">', '</div>'); 
        // $this->form_validation->set_rules("confirm", "coche", "matches[ok]", array("matches" => "Vous devez confirmer la suppression."));

        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire

        $data = $this->input->post();
            
        if(!isset($_POST['confirm']) || $_POST['confirm'] != 'ok')
        { // Echec de la validation, on réaffiche la vue formulaire

            $this->load->view('header'); 
            $this->load->view('supprimer', $aView);
            $this->load->view('footer');
        }
        else
        { // La validation a réussi, on supprime en base  

            $this->load->model('produitsModel');
            $this->produitsModel->DeleteProduct($id);

            redirect("produits/liste");
        }
        } 
        else 
        { // 1er appel de la page: affichage du formulaire

            $this->load->view('header');             
            $this->load->view('supprimer', $aView);
            $this->load->view('footer');
        }
    } // -- supprimer()
}
