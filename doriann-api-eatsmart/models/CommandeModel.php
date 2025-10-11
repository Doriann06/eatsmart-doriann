<?php
/**
 * Cette classe permet de gerer les données de la table commande
 */
class CommandeModel
{
    private $pdo;
    /**
    * C'est le constructeur de la classe CommandeModel
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
    *  Cette fonction permet de recuperer tous les commandes de la base deonnée
    */
    public function getDBAllCommandes()
    {
        $stmt = $this->pdo->query("SELECT * FROM Commande");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDBCommandeById ($idCommande){
        $req="
            SELECT * FROM Commande 
            WHERE idCommande= :idCommande
            ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":idCommande",$idCommande, PDO::PARAM_INT);
        $stmt->execute();
        $commande= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $commande;
    }
    public function getDBCommaneByIdArticle($idCommande){
        $req="
            SELECT * FROM assosiation_artcicle_commande
            INNER JOIN article ON article.idArticle=assosiation_artcicle_commande.idArticle
            INNER JOIN commande ON commande.idCommande=assosiation_artcicle_commande.idCommande
            WHERE commande.idCommande=:id_Commande
            ";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(":id_Commande",$idCommande, PDO::PARAM_INT);
        $stmt->execute();
        $articleByCommande= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $articleByCommande;
    }


}

?>