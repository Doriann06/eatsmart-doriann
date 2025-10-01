<?php
require_once "./controllers/ArticleController.php";
require_once "./controllers/CategorieController.php";
require_once "./controllers/CommandeController.php";
$articleController= new ArticleController();
$categorieController= new CategorieController();
$commandeController= new CommandeController();
// Vérifie si le paramètre "page" est vide ou non présent dans l'URL
if (empty($_GET['page'])){
    // Si le paramètre est vide, on affiche un message d'erreur
    echo "La page n'existe pas";
}else{
    $url= explode("/",$_GET['page']);
    switch($url[0]){
        case 'articles':
            if (isset($url[1])){
                echo "Afficher les information de l'article: ".$url[1];
            }else{
                echo $articleController->getAllArticles();
            }
           
            break;
            case 'categories':
            if (isset($url[1])){
                echo "Afficher les information de la categorie: ".$url[1];
            }else{
                echo $categorieController->getAllCategories();
            }
           
            break;
            case 'commandes':
            if (isset($url[1])){
                echo "Afficher les information de la commande : ".$url[1];
            }else{
                echo $commandeController->getAllCommandes();
            }
           
            break;
        default:
        echo "La page n'existe pas";
    }
}

?>