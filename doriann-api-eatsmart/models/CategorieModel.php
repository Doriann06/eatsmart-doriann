<?php
/**
 * Cette classe permet de gerer les données de la table categorie
 */
class CategorieModel
{
    private $pdo;
    /**
    * C'est le constructeur de la classe CategorieModel
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
         *  Cette fonction permet de recuperer tous les categories de la base deonnée
         */
    public function getDBAllCategories()
    {
        $stmt = $this->pdo->query("SELECT * FROM Categorie");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDBCategorieById ($idCategorie){
        $req="
            SELECT * FROM Categorie 
            WHERE idCategorie= :idCategorie
            ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idCategorie",$idCategorie, PDO::PARAM_INT);
        $stmt->execute();
        $categorie= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categorie;
    }
    public function getDBCategorieByIdArticle($idCategorie){
        $req="
            SELECT * FROM article
            WHERE idCategorie=:id_Categorie
            ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":id_Categorie",$idCategorie, PDO::PARAM_INT);
        $stmt->execute();
        $voitureByCategorie= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $voitureByCategorie;
    }


}

?>