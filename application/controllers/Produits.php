<?php
// application/controllers/Produits.php

defined('BASEPATH') or exit('No direct script access allowed');

class Produits extends CI_Controller
{

    // Exo 1 et 2
    // public function liste()
    // {
    //     // Déclaration du tableau associatif à tranmettre à la vue
    //     $aView = array();
    //     $aProduits = ["Aramis", "Athos", "Clatronic", "Camping", "Green"];   

    //     // Dans le tableau, on créé une donnée 'prénom' qui a pour valeur 'Dave'    
    //     $aView["nom"] = "Loper";        
    //     $aView["prenom"] = "Dave";  

    //     $aView["liste_produits"] = $aProduits;  


    //     // On passe le tableau en second argument de la méthode 
    //     $this->load->view('liste', $aView);
    // }
    public function produit($id)
    {
        $this->load->model('ProduitsModel');
        $aProduit = $this->ProduitsModel->produit($id);
        $aView["produit"] = $aProduit;
        $this->load->view('produit', $aView);
    }
    public function liste()
    {
        $this->load->model('ProduitsModel');
        $aListe = $this->ProduitsModel->liste();
        $aView["liste"] = $aListe;
        $this->load->view('liste', $aView);
    }


    public function ajouter()
    {
        $this->load->model('CategoriesModel');
        $aCategories = $this->CategoriesModel->liste();
        $aView["categories"] = $aCategories;
        $this->load->library('upload');
        if ($this->input->post()) { 
            $data = $this->input->post();
            $data["pro_d_ajout"] = date("Y-m-d");
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');

            if ($this->form_validation->run() == FALSE) { 

                $this->load->view('ajouter', $aView);
            } else {
                if ($_FILES) {

                    $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
                }
                $this->load->model('ProduitsModel');
                $aId = $this->ProduitsModel->ajouter($data);

                $aView["id"] = $aId;
                // chemin du fichier stocké
                $config['upload_path'] = './assets/img/';
                // nom du fichier
                $config['file_name'] = $aId . '.' . $extension;
                //fichiers autorisés
                $config['allowed_types'] = 'gif|jpg|png';
                //taille maximum  autorisée
                $config['max_size'] = 300;
                //largeur maximum  autorisée
                $config['max_width'] = 1024;
                //hauteur maximum  autorisée
                $config['max_height'] = 768;
                $this->load->library('upload');
                // initialisation de config 
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('pro_photo')) {
                    $errors =  $this->upload->display_errors("<div class='alert alert-danger'>", "</div>");
                    $aView["errors"] = $errors;
                    $this->load->view('ajouter', $aView);

                } else {
                    redirect('produits/liste');
                }
            }
        } else {
            $this->load->view('ajouter', $aView);
        }
    } // -- ajouter() 




    public function modifier($id)
    {
        $this->load->model('CategoriesModel');
        $aCategories = $this->CategoriesModel->liste();
        $aView["categories"] = $aCategories;
        $this->load->model('ProduitsModel');
        $aProduit = $this->ProduitsModel->produit($id);
        $aView["produit"] = $aProduit;
        $this->load->library('upload');

        if ($this->input->post()) {
            $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');
            $data = $this->input->post();
            unset($data["id"]);
            $id = $this->input->post('id');
            $data["pro_d_modif"] = date("Y-m-d");

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('modifier', $aView);
            } else {

                if ($_FILES) {
                    $extension = substr(strrchr($_FILES["pro_photo"]["name"], "."), 1);
                }
                $this->load->model('ProduitsModel');
                $this->ProduitsModel->modifier($data, $id);
                // chemin du fichier stocké
                $config['upload_path'] = './assets/img/';
                // nom du fichier
                $config['file_name'] = $id . '.' . $extension;
                //fichiers autorisés
                $config['allowed_types'] = 'gif|jpg|png';
                //taille maximum  autorisée
                $config['max_size'] = 400;
                //largeur maximum  autorisée
                $config['max_width'] = 1024;
                //hauteur maximum  autorisée
                $config['max_height'] = 768;

                $this->load->library('upload');

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('pro_photo')) {
                    $errors =  $this->upload->display_errors("<div class='alert alert-danger'>", "</div>");
                    $aView["errors"] = $errors;
                    $this->load->view('modifier', $aView);
                } else {
                    redirect("produits/liste");
                }
                redirect("produits/liste");
            }
        }
    } // -- modifier()


    public function supprimer($id)
    {
        $this->load->model('ProduitsModel');
        $aProduit = $this->ProduitsModel->supprimer($id);
        $aView["produit"] = $aProduit;
        if ($this->input->post()) {
            $data = $this->input->post();
            $this->load->model('ProduitsModel');
            $aSupp = $this->ProduitsModel->supprimer($id);
            redirect("produits/liste");
        } else {
            $this->load->view('supprimer', $aView);
        }
    }
};