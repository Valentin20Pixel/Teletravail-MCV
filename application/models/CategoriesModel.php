<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class CategoriesModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    } 
    public function liste()
    {
        $aCategories = $this->db->get('jdt_categories')->result();
        return $aCategories; 
    }
    public function categorie($id)
    {        
        $aCategories = $this->db->get_where('jdt_categories', array ('cat_id'=> $id))->row();
        return $aCategories;
    }
    public function ajouter($data) 
    {
        $this->db->insert('jdt_categories', $data);
    }
    public function modifier($data, $id) 
    {
        $this->db->update('jdt_categories', $data, array('cat_id' => $id));

    }
    public function supprimer($id) 
    {
        $this->db->delete('jdt_categories', array('cat_id'=>$id));
        
    }
}