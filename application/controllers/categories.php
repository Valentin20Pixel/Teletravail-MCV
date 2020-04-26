<?php
// application/controllers/Produits.php

defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
    public function liste()
    {
        $this->load->model('CategoriesModel');
        $aCategories = $this->CategoriesModel->liste();
        $aView["categories"] = $aCategories;
        $this->load->view('ajouter', $aView);
    }
}
