<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class UtilisateursModel extends CI_Model
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
        $requete = $this->db->query("SELECT * FROM jdt_users");
        $aUser = $requete->result();  
        return $aUser; 
    }
    public function users($id)
    {
        $aUser = $this->db->get_where('jdt_users', array ('id'=> $id))->row();
        return $aUser;
    }
    public function inscription($data)
    {
        $this->db->insert('jdt_users', $data);   
        return $this->db->insert_id();
    }
    public function supprimer($id) 
    {
        $this->db->delete('jdt_produits', array('pro_id'=>$id));
        
    }
};
