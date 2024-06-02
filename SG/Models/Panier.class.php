<?php 
class Panier{
    private $idPanier;
    private $idClients;
    private $idArticles;

    private $commande;


    public function __construct($idPanier,$idClients,$idArticles,$commande)
    {
        $this->idPanier = $idPanier;
        $this->idClients = $idClients;
        $this->idArticles = $idArticles;

        $this->commande = $commande;

    }

    public function getIdPanier(){return $this->idPanier;}
    public function getIdClients(){return $this->idClients;}
    public function getIdArticle(){return $this->idArticles;}
    public function getCommandePanier(){return $this->commande;}


    public function setIdPanier($idPanier){$this->idPanier = $idPanier;}
    public function setIdClients($idClients){$this->idClients = $idClients;}
    public function setIdArticle($idArticles){$this->idArticles = $idArticles;}
    public function setCommandePanier($commande){$this->commande = $commande;}


}