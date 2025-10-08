<?php
require_once "models/CategorieModel.php";
/** 
*Cette classe permet de controler les echanges des categorie avec
*l'utilisateur et la logique du code
*/
class CategorieController
    {
        private $model;
        /**
         * C'est le constructeur de la classe CategorieController
         */
        public function __construct()
        {
            $this->model =new CategorieModel();
        }
        /**
         *  Cette fonction permet de recuperer tous les categories de la base deonnée
         */
        public function getAllCategories()
        {
            $categories= $this->model->getDBAllCategories();
            echo json_encode($categories);
        }
        public function getCategorieById ($idCategorie){
            $lignesCategorie =$this->model->getDBCategorieById($idCategorie);
            echo json_encode($lignesCategorie);
        }
    }

    
?>