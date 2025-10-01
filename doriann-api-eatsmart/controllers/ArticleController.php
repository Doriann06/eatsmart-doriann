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
    }

    
?>