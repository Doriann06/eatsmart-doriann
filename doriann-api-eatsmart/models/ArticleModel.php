<?php
/**
 * Cette classe permet de gerer les données de la table d'article
 */
class ArticleModel
{
    private $pdo;
    /**
    * C'est le constructeur de la classe ArticleModel
    */
    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=eatsmart_bdd_doriann;charset=utf8", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    /**
    *  Cette fonction permet de recuperer tous les articles de la base deonnée
    */
    public function getDBAllArticles()
    {
        $stmt = $this->pdo->query("SELECT * FROM Article");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>