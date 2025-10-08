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
    public function getDBArticleById ($idArticle){
        $req="
            SELECT * FROM Article 
            WHERE idArticle= :idArticle
            ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idArticle",$idArticle, PDO::PARAM_INT);
        $stmt->execute();
        $article= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $article;
    }
    public function getDBArticleByIdCommande($idArticle){
        $req="
            SELECT * FROM assosiation_artcicle_commande
            INNER JOIN article ON article.idArticle=assosiation_artcicle_commande.idArticle
            INNER JOIN commande ON commande.idCommande=assosiation_artcicle_commande.idCommande
            WHERE article.idArticle=:id_Article
            ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":id_Article",$idArticle, PDO::PARAM_INT);
        $stmt->execute();
        $voitureByArticle= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $voitureByArticle;
    }

}

?>