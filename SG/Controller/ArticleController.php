<?php

// require_once "C:\Users\DWWM\Desktop\Repo Orga\Magasin-Vetement-SG\Models\ArticleManager.php";
// require_once "Models/"
require_once "Models/ArticleManager.php";

class ArticleController{
    
    private $articleManager;
    private $articles;

    public function __construct(){
        require_once "Models/ArticleManager.php";
        $this->articleManager = new ArticleManager;
        $this->articleManager->chargementArticle();

    }

    public function afficherArticles(){
        
        $articles = $this->articleManager->getArticle();
        require_once "Views/crud.php";
    }

    public function afficherArticle($id) {
            $article = $this->articleManager->getArticleById($id);
            if ($article === null){
                echo "Article not found";
                return;
            }
                require_once "Views/afficherArticle.view.php";
        }


    public function afficherArticlePanier($id){
        $articles = $this->articleManager->getArticleById($id);

        if ($articles) {
                
            return "
                    <div>   
                        <td><h2>" . $articles->getNomArticle() . "</h2></td>
                        <td><img id='imgafficher' class='article-image' src='" . URL . "../../../public/images/" . $articles->getImageArticle() . "' alt='img'></td>
                        <td>" . $articles->getTailleArticle() . "</td>
                        <td>" . $articles->getPrixArticle() . " €</td>
                    </div>";
        } else {
            return "<div class='article'>Article non trouvé</div>";
        }

        require "Views/panier.view.php";

    }

    public function ajoutArticle(){
        require_once "Views/ajoutArticle.view.php";
    }

    public function ajoutArticleValidation(){
        $file =$_FILES['image'];
        $repertoire = "public/images/";
        $nomImageAjoute = $this->ajoutImage($file,$repertoire);

        $this->articleManager->ajoutArticleBD($_POST['nom'],$_POST['description'],$_POST['taille'],$_POST['prix'],$_POST['genre'],$_POST['type'],$_POST['ref'],$nomImageAjoute);
        header('Location: ' . URL . "crud");
    }

    private function ajoutImage($file, $dir){
        //Va d'abord vérifier si on a renseigné une image dans le formulaire
        if(!isset($file['name']) || empty($file['name']))
            //si c'est pas le cas, on aura une première erreur
            throw new Exception("Vous devez indiquer une image");
        
        //Ensuite, il va vérifier si le répertoire public/image existe
        //Si c'est pas le cas il va le créer avec les droits 0777
        if(!file_exists($dir)) mkdir($dir,0777);
        
        //On récupère l'extension du fichier
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        //on va générer un chiffre aléatoire pour donner un nom de fichier
        do {
            $random = rand(0,99999);
            $target_file = $dir.$random."_".$file['name'];
        } while (file_exists($target_file));
        
        //Ensuite je fais différents tests pour vérifier que le fichier correspond bien à ce qui est attendu
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        //Va permettre de rajouter notre image directement dans le dossier
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        //Si jamais tout c'est bien passé, on enverra le nom de l'image
        else return ($random."_".$file['name']);
    }

    public function suppressionArticle($id){
        $nomImage = $this->articleManager->getArticleById($id)->getImageArticle();
        unlink("public/images/".$nomImage);
        $this->articleManager->suppressionArticleBD($id);
        header('Location: ' .URL. "crud");
    }

    public function suppressionArticlePanier($id){

        $this->articleManager->suppressionArticlePanierBD($id);
        header('Location: ' .URL. "panier");
    }

    public function modificationArticle($id){
        $articles = $this->articleManager->getArticleById($id);
        require "Views/modifierArticle.view.php";
    }

    public function modifArticleValidation(){
        $imageActuelle = $this->articleManager->getArticleById($_POST['identifiant'])->getImageArticle();
        $file = $_FILES['image'];
        if($file['size']>0){
            unlink("public/images/".$imageActuelle);
            $repertoire ="public/images/";
            $nomImageAdd = $this->ajoutImage($file,$repertoire);
        }else{
            $nomImageAdd = $imageActuelle;
        }
        $this->articleManager->modifArticleBD($_POST['identifiant'],$_POST['nom'],$_POST['description'],$_POST['taille'],$_POST['prix'],$_POST['genre'],$_POST['type'],$_POST['ref'],$nomImageAdd);
        header('Location: '. URL . "crud");
    }

    public function searchArticles() {
        $query = isset($_GET['query']) ? $_GET['query'] : '';
        $articles = $this->articleManager->searchArticles($query);
        require_once "Views/searchResults.view.php";
    }
}