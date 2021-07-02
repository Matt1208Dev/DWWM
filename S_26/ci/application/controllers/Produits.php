<?php

/**
 * \file Produits.php
 * 
 * \brief contient la class Produits avec tous les attributs et méthodes relatifs à la gestion produit
 * \version 1.0
 * \author Matthieu Gueulle
 * date 22/06/2021
 */
// application/controllers/Produits.php

defined('BASEPATH') or exit('No direct script access allowed');

class Produits extends CI_Controller
{

    /**
     * \brief Charge la table products de la BDD et la transmet à la vue liste.php pour affichage
     */
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

    public function details($id)
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('produitsModel');

        // Appel de la méthode liste() dans produitsModel, récupération du tableau de résultat dans $aliste
        $this->load->model('produitsModel');
        $produit = $this->produitsModel->ProductDetails($id);
        $aView["produit"] = $produit[0];

        // Appel de la vue avec transmission du tableau
        $this->load->view('header');
        $this->load->view('details', $aView);
        $this->load->view('footer');
    }


    /**
     * \brief Procède à l'ajout d'un produit en BDD après vérification des entrées formulaire en provenance de add_form.php
     */
    public function ajouter()
    {
        // // Chargement des assistants 'form' et 'url'
        // $this->load->helper('form', 'url'); 

        // Chargement de l'assistant 'upload'
        $this->load->library('upload');

        // // Chargement de la librairie 'database'
        // $this->load->database(); 

        // // Chargement de la librairie form_validation
        // $this->load->library('form_validation'); 

        // Requête de sélection des catégories produit
        $this->load->model('produitsModel');
        $categories = $this->produitsModel->getCategories();
        $aView["categories"] = $categories;

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
                $this->load->view('add_form', $aView);
                $this->load->view('footer');
            }
            else 
            { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base

                // On vérifie s'il y a un upload de fichier. Si oui, on récupère l'extension pour l'ajouter en bdd.
                if ($_FILES)
                {
                    // On extrait l'extension du nom du fichier   
                    $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
                    $data['pro_photo'] = $extension;
                }

                // Si une sous-catégorie a été séléctionnée c'est elle qui sera enregistrée en bdd.
                if (isset($_POST['pro_cat_id2']))
                {
                    $data['pro_cat_id'] = $data['pro_cat_id2'];
                    unset($data['pro_cat_id2']);                
                }

                // Insertion en bdd
                $this->load->model('produitsModel');
                $this->produitsModel->insertProduct($data);

                $id = $this->db->insert_id();

                // On créé un tableau de configuration pour l'upload
                $config['upload_path'] = './assets/images/'; // chemin où sera stocké le fichier

                // nom du fichier final
                $config['file_name'] = $id . '.' . $extension;

                // On indique les types autorisés (ici pour des images)
                $config['allowed_types'] = 'gif|jpg|jpeg|png|jfif';

                // On charge la librairie 'upload'
                $this->load->library('upload');

                // On initialise la config 
                $this->upload->initialize($config);

                // La méthode do_upload() effectue les validations sur l'attribut HTML 'name' ('fichier' dans notre formulaire) et si OK renomme et déplace le fichier tel que configuré
                if (!$this->upload->do_upload('pro_photo')) 
                {
                    // Echec : on récupère les erreurs dans une variable (une chaîne)
                    $sUploadErrors = $this->upload->display_errors();

                    // on réaffiche la vue du formulaire en passant les erreurs 
                    $aView["sUploadErrors"] = $sUploadErrors;

                    /* On envoie le message d'erreur dans le fichier php_error.log*/
                    error_log($sUploadErrors, 0);

                    /* Pour l'utilisateur, on envoie un message flash
                    * Cela nécessite la librairie 'session'
                    */
                    $this->load->library('session');
                    $this->session->set_flashdata('sUploadError2', 'Le téléchargement de la photo a échoué.');

                    // Réaffichage du formulaire 
                    $this->load->view('header');
                    $this->load->view('add_form', $aView);
                    $this->load->view('footer');
                } 
                else 
                { // Succès 
                    redirect('produits/liste');
                }

                redirect("produits/liste");
            }

            } 
            else 
            { // 1er appel de la page: affichage du formulaire
                $this->load->view('header');
                $this->load->view('add_form', $aView);
                $this->load->view('footer');
            }
        } // -- ajouter()



    /**
     * \brief Met à jour les champ d'un produit en BDD après vérification des entrées formulaire en provence de update_form.php
     * \param $id[in] INT id du produit concerné
     */
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

        // Requête de sélection des catégories produit
        $this->load->model('produitsModel');
        $categories = $this->produitsModel->getCategories();
        $aView["categories"] = $categories;

        if ($this->input->post()) { // 2ème appel de la page: traitement du formulaire

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

            if ($this->form_validation->run() == FALSE) { // Echec de la validation, on réaffiche la vue formulaire
                $this->load->view('header');
                $this->load->view('update_form', $aView);
                $this->load->view('footer');
            } else { // La validation a réussi, nos valeurs sont bonnes, on peut modifier en base  

                $this->load->model('produitsModel');
                $this->produitsModel->UpdateProduct($id, $data);
                $this->produitsModel->UpdateProductLastModifDate($id);

                redirect("produits/liste");
            }
        } else { // 1er appel de la page: affichage du formulaire 
            $this->load->view('header');
            $this->load->view('update_form', $aView);
            $this->load->view('footer');
        }
    } // -- modifier()


    /**
     * \brief Supprime une ligne produit en BDD.
     * \param $id[in] INT id du produit concerné
     */
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

        if ($this->input->post()) { // 2ème appel de la page: traitement du formulaire

            $data = $this->input->post();

            if (!isset($_POST['confirm']) || $_POST['confirm'] != 'ok') { // Echec de la validation, on réaffiche la vue formulaire

                $this->load->view('header');
                $this->load->view('supprimer', $aView);
                $this->load->view('footer');
            } else { // La validation a réussi, on supprime en base  

                $this->load->model('produitsModel');
                $this->produitsModel->DeleteProduct($id);

                redirect("produits/liste");
            }
        } else { // 1er appel de la page: affichage du formulaire

            $this->load->view('header');
            $this->load->view('supprimer', $aView);
            $this->load->view('footer');
        }
    } // -- supprimer()
}
