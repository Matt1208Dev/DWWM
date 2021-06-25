<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProduitsModel extends CI_Model
{
    public function liste() 
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM produits");
        $aProduits = $requete->result();  

        return $aProduits;            
    } // -- liste()    

    // Insertion d'un nouveau produit
    public function insertProduct($data)
    {
        $this->db->insert('produits', $data);
    }

    // Details d'une ligne produit
    public function ProductDetails($id)
    {
        // Requête de sélection de l'enregistrement souhaité 
        $requete = $this->db->query("SELECT * FROM produits WHERE pro_id= ?", $id);
        $produit = $requete->result();

        return $produit;
    }

    // Chargement catégories produit
    public function getCategories()
    {
        // Requête de sélection de l'enregistrement souhaité 
        $requete = $this->db->query("SELECT * FROM categories");
        $categories = $requete->result();

        return $categories;
    }

    // Mise à jour d'un produit
    public function UpdateProduct($id, $data)
    {
        $this->db->where('pro_id', $id);
        $this->db->update('produits', $data);

    }

    // Mise à jour date de dernière modification d'un produit
    public function UpdateProductLastModifDate($id)
    {
        $pro_d_modif = date('Y-m-d h:i:s');
        $this->db->where('pro_id', $id);
        $this->db->update('produits', array('pro_d_modif'=>$pro_d_modif));
    }

    // Suppression d'un produit
    public function DeleteProduct($id)
    {
        $this->db->where('pro_id', $id);
        $this->db->delete('produits');
    }
} // -- ProduitsModel  