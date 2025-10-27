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
        public function getCategorieByIdArticle($idCategorie){
            $lignesCategorieByIdArticle=$this->model->getDBCategorieByIdArticle($idCategorie);
            echo json_encode($lignesCategorieByIdArticle);

        }
        public function createCategorie($data){
            $lignesCategorie = $this->model->createDBCategorie($data);
            http_response_code(201);
            echo json_encode($lignesCategorie);
        }
        public function updateCategorie($id,$data){
            $success = $this->model->updateDBCategorie($id,$data);
            if ($success){
                http_response_code(204);
            } else{
                http_response_code(404);
                echo json_encode(["message"=> "categorie non trouvé ou non modifiée"]);
            }
            
        }
        public function deleteCategorie($id){
            $success = $this->model->deleteDBCategorie($id);
            if ($success){
                http_response_code(204);
            } else{
                http_response_code(404);
                echo json_encode(["message"=> "categorie introuvable"]);
            }
            
        }
    }

    
?>