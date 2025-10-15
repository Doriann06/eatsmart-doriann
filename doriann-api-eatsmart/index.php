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
    $method= $_SERVER["REQUEST_METHOD"];
    switch($url[0]){
        case 'articles':
            switch($method){
                case "GET":
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
                case "POST":
                    $data=json_decode(file_get_contents("php://input"),true);
                    $articleController->createArticle($data);
                    break;
                case "PUT":
                    if (isset($url[1])){
                        $data=json_decode(file_get_contents("php://input"),true);
                        $articleController->updateArticle($url[1],$data);
                    } else{
                        http_response_code(400);
                        echo json_encode(["message"=>"ID du Article manquant dans l'URL"]);
                    }
                    case "DELETE":
                        if (isset($url[1])){
                            $articleController->deleteArticle($url[1]);
                        } else{
                            http_response_code(400);
                            echo json_encode(["message"=>"ID du article manquant dans l'URL"]);
                        }
                        break;
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