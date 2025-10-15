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
        $commandeByArticle= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $commandeByArticle;
    }
    public function createDBArticle($data){
        $req ="INSERT INTO article (idArticle,nomArticle,ingredientsArticle,quantiteArticle,PrixArticle,idCategorie)
                VALUES (:idArticle,:nomArticle,:ingredientsArticle,:quantiteArticle,:PrixArticle,:idCategorie)";
            $stmt =$this->pdo->prepare($req);
            $stmt->bindParam(":idArticle",$data['idArticle'],PDO::PARAM_INT);
            $stmt->bindParam(":nomArticle",$data['nomArticle'],PDO::PARAM_STR);
            $stmt->bindParam(":ingredientsArticle",$data['ingredientsArticle'],PDO::PARAM_STR);
            $stmt->bindParam(":quantiteArticle",$data['quantiteArticle'],PDO::PARAM_STR);
            $stmt->bindParam(":PrixArticle",$data['PrixArticle'],PDO::PARAM_STR);
            $stmt->bindParam(":idCategorie",$data['idCategorie'],PDO::PARAM_INT);


            $stmt->execute();
            $chauffeur=$this->getDBArticleById($data['idArticle']);
        return $chauffeur;
    }

}

?>