<?php
require_once "models/ArticleModel.php";
/** 
*Cette classe permet de controler les echanges des articles avec
*l'utilisateur et la logique du code
*/
class ArticleController
    
    {
        private $model;
        /**
         * C'est le constructeur de la classe ArticleController
         */
        public function __construct()
        {
            $this->model =new ArticleModel();
        }
        /**
         *  Cette fonction permet de recuperer tous les articles de la base deonnée
         */
        public function getAllArticles()
        {
            $articles= $this->model->getDBAllArticles();
            echo json_encode($articles);
        }
        public function getArticleById ($idArticle){
            $lignesArticle =$this->model->getDBArticleById($idArticle);
            echo json_encode($lignesArticle);
        }
        public function getArticleByIdCommande($idArticle){
            $lignesArticleByIdCommande=$this->model->getDBArticleByIdCommande($idArticle);
            echo json_encode($lignesArticleByIdCommande);

        }
        public function createArticle($data){
            $lignesArticle = $this->model->createDBArticle($data);
            http_response_code(201);
            echo json_encode($lignesArticle);
        }
        public function updateArticle($id,$data){
            $success = $this->model->updateDBArticle($id,$data);
            if ($success){
                http_response_code(204);
            } else{
                http_response_code(404);
                echo json_encode(["message"=> "article non trouvé ou non modifiée"]);
            }
            
        }
        public function deleteArticle($id){
            $success = $this->model->deleteDBArticle($id);
            if ($success){
                http_response_code(204);
            } else{
                http_response_code(404);
                echo json_encode(["message"=> "article introuvable"]);
            }
            
        }
    }

    
?>