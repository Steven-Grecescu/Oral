<?php 
class Articles{
    private $idArticle;
    private $nomArticle;
    private $description;
    private $ref;
    private $image;
    private $prix;
    private $genre;
    private $type;
    private $taille;

    public function __construct($idArticle,$nomArticle,$description,$prix,$genre,$type,$taille,$ref,$image)
    {
        $this->idArticle = $idArticle;
        $this->nomArticle = $nomArticle;
        $this->description = $description;
        $this->prix = $prix;
        $this->genre = $genre;
        $this->type = $type;
        $this->taille = $taille;
        $this->ref = $ref;
        $this->image = $image; 
    }

    public function getIdArticle(){return $this->idArticle;}
    public function getNomArticle(){return $this->nomArticle;}
    public function getDescriptionArticle(){return $this->description;}
    public function getPrixArticle(){return $this->prix;}
    public function getGenreArticle(){return $this->genre;}
    public function getTypeArticle(){return $this->type;}
    public function getTailleArticle(){return $this->taille;}
    public function getRefArticle(){return $this->ref;}
    public function getImageArticle(){return $this->image;}

    public function setIdArticle($idArticle){$this->idArticle = $idArticle;}
    public function setNomArticle($nomArticle){$this->nomArticle = $nomArticle;}
    public function setDescriptionArticle($description){$this->description = $description;}
    public function setPrixArticle($prix){$this->prix = $prix;}
    public function setGenreArticle($genre){$this->genre = $genre;}
    public function setTypeArticle($type){$this->type = $type;}
    public function setTailleArticle($taille){$this->taille = $taille;}
    public function setRefArticle($ref){$this->ref = $ref;}
    public function setImageArticle($image){$this->image = $image;}
}