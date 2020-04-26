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
        $this->db->update('jdt_produits', $data, array('pro_id' => $id));
            
        } 

    public function supprimer($id) 
    {
        $this->db->delete('jdt_produits', array('pro_id'=>$id));
        
    }
    
}