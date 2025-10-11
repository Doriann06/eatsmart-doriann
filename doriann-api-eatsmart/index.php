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
            if (isset($url[2])){
                if ($url[2]=="commandes"){
                    echo $articleController->getArticleByIdCommande($url[1]);
                }
            }else if (isset($url[1])){
                echo $articleController->getArticleById($url[1]);
            }else{
                echo $articleController->getAllArticles();
            }
           
            break;
            case 'categories':
                if (isset($url[2])){
                    if ($url[2]=="articles"){
                        echo $categorieController->getCategorieByIdArticle($url[1]);
                    }
                }else if (isset($url[1])){
                echo $categorieController->getCategorieById($url[1]);
            }else{
                echo $categorieController->getAllCategories();
            }
           
            break;
            case 'commandes':
                 if (isset($url[2])){
                if ($url[2]=="articles"){
                    echo $commandeController->getCommandeByIdArticle($url[1]);
                }
            }else if (isset($url[1])){
                echo $commandeController->getCommandeById($url[1]);
            }else{
                echo $commandeController->getAllCommandes();
            }
           
            break;
        default:
        echo "La page n'existe pas";
    }
}

?>