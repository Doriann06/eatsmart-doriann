<?php
require_once "models/CommandeModel.php";
/** 
*Cette classe permet de controler les echanges des commandes entre
*l'utilisateur et la logique du code
*/
class CommandeController
    {
        private $model;
        /**
         * C'est le constructeur de la classe CommandeController
         */
        public function __construct()
        {
            $this->model =new CommandeModel();
        }
        /**
         *  Cette fonction permet de recuperer tous les commandes de la base deonnée
         */
        public function getAllCommandes()
        {
            $commandes= $this->model->getDBAllCommandes();
            echo json_encode($commandes);
        }
        public function getCommandeById ($idCommande){
            $lignesCommande =$this->model->getDBCommandeById($idCommande);
            echo json_encode($lignesCommande);
        }
    }

    
?>