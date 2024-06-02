<?php
require_once "Model.class.php";
require_once "Article.class.php";

class ArticleManager extends BDConnexion{
    private $articles;

    public function ajoutArticle($article){
        $this->articles[] = $article;
    }

    public function getArticle(){return $this->articles;}
    
    public function chargementArticle(){
        $req = $this->getBDD()->prepare('SELECT * FROM articles');
        $req->execute();
        $mesArticles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesArticles as $value){
            $art = new Articles($value['idArticles_Articles'],$value['nomArticle_Articles'],$value['description_Articles'],$value['prix_Articles'],$value['genre_Articles'],$value['type_Articles'],$value['taille_Articles'],$value['ref_Articles'],$value['image_Articles']);
            $this->ajoutArticle($art);

        }
    }

    public function getArticleById($id){
        for($i=0;$i<count($this->articles);$i++){
            if($this->articles[$i]->getIdArticle() == $id){
                return $this->articles[$i];
            }
        }
    }
    
    public function ajoutArticleBD($nom,$desc,$taille,$prix,$genre,$type,$ref,$image){

        $req ="INSERT INTO articles(nomArticle_Articles,description_Articles,taille_Articles,prix_Articles,genre_Articles,type_Articles,ref_Articles,image_Articles)
        values (:nomArticle_Articles,:description_Articles,:taille_Articles,:prix_Articles,:genre_Articles,:type_Articles,:ref_Articles,:image_Articles)";

        $stmt =$this->getBDD()->prepare($req);
        $stmt->bindValue(":nomArticle_Articles",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":description_Articles",$desc,PDO::PARAM_STR);
        $stmt->bindValue(":taille_Articles",$taille,PDO::PARAM_INT);
        $stmt->bindValue(":prix_Articles",$prix,PDO::PARAM_INT);
        $stmt->bindValue(":genre_Articles",$genre,PDO::PARAM_STR);
        $stmt->bindValue(":type_Articles",$type,PDO::PARAM_STR);
        $stmt->bindValue(":ref_Articles",$ref,PDO::PARAM_STR);
        $stmt->bindValue(":image_Articles",$image,PDO::PARAM_STR);

        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $article = new Articles($this->getBDD()->lastInsertId(),$nom,$desc,$taille,$prix,$genre,$type,$ref,$image);
            $this->ajoutArticle($article);
        }

    }

    public function suppressionArticleBD($id){
        $req = "DELETE FROM articles WHERE idArticles_Articles = :idArticles_Articles";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":idArticles_Articles",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat>0){
        $article=$this->getArticleById($id);
        unset($article);
        }
    }

    public function suppressionArticlePanierBD($id){
        $req = "DELETE FROM panier WHERE idPanier_Panier = :idPanier_Panier";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":idPanier_Panier",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat>0){
        $article=$this->getArticleById($id);
        unset($article);
        }
    }

    public function modifArticleBD($id,$nom,$descri,$taille,$prix,$genre,$type,$ref,$image){
        $req = "UPDATE articles SET nomArticle_Articles = :nomArticle_Articles, description_Articles = :description_Articles,taille_Articles = :taille_Articles,prix_Articles = :prix_Articles,genre_Articles = :genre_Articles,
        type_Articles = :type_Articles,ref_Articles = :ref_Articles,image_Articles = :image_Articles 
        WHERE idArticles_Articles = :idArticles_Articles";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(":idArticles_Articles",$id,PDO::PARAM_INT);
        $stmt->bindValue(":nomArticle_Articles",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":description_Articles",$descri,PDO::PARAM_STR);
        $stmt->bindValue(":taille_Articles",$taille,PDO::PARAM_STR);
        $stmt->bindValue(":prix_Articles",$prix,PDO::PARAM_INT);
        $stmt->bindValue(":genre_Articles",$genre,PDO::PARAM_STR);
        $stmt->bindValue(":type_Articles",$type,PDO::PARAM_STR);
        $stmt->bindValue(":ref_Articles",$ref,PDO::PARAM_STR);
        $stmt->bindValue(":image_Articles",$image,PDO::PARAM_STR);

        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $this->getArticleById($id)->setNomArticle($nom);
            $this->getArticleById($id)->setDescriptionArticle($descri);
            $this->getArticleById($id)->setTailleArticle($taille);
            $this->getArticleById($id)->setPrixArticle($prix);
            $this->getArticleById($id)->setGenreArticle($genre);
            $this->getArticleById($id)->setTypeArticle($type);
            $this->getArticleById($id)->setRefArticle($ref);
            $this->getArticleById($id)->setImageArticle($image);
        }
    }

    public function searchArticles($query) {
        $req = $this->getBDD()->prepare('SELECT * FROM articles WHERE nomArticle_Articles LIKE :query OR description_Articles LIKE :query');
        $req->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
        $req->execute();
        $results = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $searchResults = [];
        foreach ($results as $value) {
            $searchResults[] = new Articles(
                $value['idArticles_Articles'],
                $value['nomArticle_Articles'],
                $value['description_Articles'],
                $value['prix_Articles'],
                $value['genre_Articles'],
                $value['type_Articles'],
                $value['taille_Articles'],
                $value['ref_Articles'],
                $value['image_Articles']
            );
        }
        return $searchResults;
    }


}