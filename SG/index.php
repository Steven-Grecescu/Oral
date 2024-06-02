<?php
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "Controller/ArticleController.php";

$ArticleController = new ArticleController;
session_start();
try{
    if(empty($_GET['page'])){
        require_once "Views/accueil.view.php";
    }else{
        $url = explode("/",filter_var($_GET['page']),FILTER_SANITIZE_URL);
        switch($url[0]){
            case "accueil" : require_once "Views/accueil.view.php";
            
            break;
            
            case "crud":
                if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
                    if (empty($url[1])) {
                        $ArticleController->afficherArticles();
                    } else if ($url[1] === "l") {
                        $ArticleController->afficherArticle(intval($url[2]));
                    } else if ($url[1] === "a") {
                        $ArticleController->ajoutArticle();
                    } else if ($url[1] === "m") {
                        $ArticleController->modificationArticle($url[2]);
                    } else if ($url[1] === "s") {
                        $ArticleController->suppressionArticle($url[2]);
                    } else if ($url[1] === "av") {
                        $ArticleController->ajoutArticleValidation();
                    } else if ($url[1] === "mv") {
                        $ArticleController->modifArticleValidation();
                    } else {
                        throw new Exception("La page n'existe pas");
                    }
                } else {
                    throw new Exception("Accès non autorisé");
                }
                break;

            case "article":
                if (!empty($url[1])) 
                    $ArticleController->afficherArticle(intval($url[1]));
                else {
                    throw new Exception("Article non spécifié");
                }
                break;

            case "homme":
                require_once "Views/homme.php";

                break;

            case "femme":
                require_once "Views/femme.php";
                break;

            case "fille":
                require_once "Views/fille.php";
                break;

            case "garçon":
                require_once "Views/garcon.php";
                break;

            case "panier":
                
                require_once "Views/panier.view.php";
                break;

            case "login":
                require_once "Views/login.view.php";
                break;

            case "register":
                require_once "Views/register.view.php";
                break;

            case "compte":
                require_once "Views/compte.view.php";
                break;

            // case "search":
            //     require_once "Views/searchResults.view.php";
            //     break;

            case "removeItem":
                $ArticleController->suppressionArticlePanier($url[1]);
                break;

            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>