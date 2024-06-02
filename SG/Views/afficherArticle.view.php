<?php ob_start() ?>
<div class="DivArticleAffichage">
    
    <h2 class="NomArticle"> <?= $article->getNomArticle() ?> </h2>
    <img id="imgafficher" src="<?= URL ?>../../../public/images/<?= $article->getImageArticle();?>" alt="img">
    <p class="DescArticle">Description : <?= $article->getDescriptionArticle(); ?></p>
    <p class="TailleArticle">Taille : <?= $article->getTailleArticle();?></p>
    <p class="PrixArticle">Prix : <?= $article->getPrixArticle();?> €  </p>
    <p class="RefAcle">Ref : <?= $article->getRefArticle();?></p>
    <form class="formAfficherArticle" method="POST" action="../Models/Panier.php">
    <input type="hidden" style="" name="idArticle" value="<?= $article->getIdArticle();?>" >
    <button class="buttonAfficherArticle" type="submit">Ajouter au panier</button>
    </form>
</div>

<?php 
$content = ob_get_clean();
require "template.php"; 
?>