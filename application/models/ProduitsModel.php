<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProduitsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    } 
    public function liste()
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM jdt_produits");
        $aProduits = $requete->result();  

        return $aProduits; 
    }

    public function produit($id)
    {        
        // Classe Query Builder
        $aProduit = $this->db->get_where('jdt_produits', array ('pro_id'=> $id))->row();
        return $aProduit;
    }

    public function ajouter($data) 
    {
        $this->db->insert('jdt_produits', $data);   
        return $this->db->insert_id();  
    }

    public function modifier($data,$id) 
    {
         // chargement/connexion à la BDD
        $this->load->database();
         // stockage du résultat de l'upload dans un tableau
        $file = $this->upload->data();
         // stockage des données du formulaire dans un tableau
        $data = $this->input->post();
         // S'il y a upload d'image
        if ($this->upload->do_upload('pro_photo'))
        {
         // récupération de l'extension du fichier en vue de son insertion en base de données et extraction du '.' (codeigniter garde le point avant l'extension)
            $data['pro_photo'] = substr($file['file_ext'], 1);
        }
         // récupération et formatage de la date (date courante) d'ajout du produit
        $data['pro_d_modif'] = date('Y-m-d');
         // envoie de la requète
        $this->db->where('pro_id', $id);
        $this->db->update('produits', $data);        
    }


    public function supprimer($id) 
    {
        $this->db->delete('jdt_produits', array('pro_id'=>$id));
        
    }
    
};