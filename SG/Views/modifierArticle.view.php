<?php ob_start() ?>
 <link rel="stylesheet" href="style.css">

<form method='POST' action="<?= URL ?>crud/mv" enctype="multipart/form-data">
    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" value="<?=$articles->getNomArticle()?>"><br>
    <label for="description">Description :</label><br>
    <input type="text" id="description" name="description" value="<?=$articles->getDescriptionArticle()?>"><br><br>
    <label for="taille">Taille :</label><br>
    <input type="number" id="taille" name="taille" value="<?=$articles->getTailleArticle()?>"><br><br>
    <label for="prix">Prix :</label><br>
    <input type="number" id="prix" name="prix" value="<?= $articles->getPrixArticle();?>"><br><br>
    <label for="genre">Genre :</label><br>
    <input type="text" id="genre" name="genre" value="<?= $articles->getGenreArticle();?>"><br><br>
    <label for="type">Type :</label><br>
    <input type="text" id="type" name="type" value="<?= $articles->getTypeArticle();?>"><br><br> 
    <label for="ref">Ref :</label><br>
    <input type="text" id="ref" name="ref" value="<?=$articles->getRefArticle()?>"><br><br>
    <h3>Image :</h3>
    <img src="<?= URL ?>public/images/<?= $articles->getImageArticle();?>">
    <label for="image">Changer l'image :</label><br>
    <input type="file" id="image" name="image">
    <br><br>
    <input type="hidden" name="identifiant" value="<?=$articles->getIdArticle();?>">
    <input type="submit" value="Valider">
</form>

<?php 
$titre = "Modification de l'article :". $articles->getNomArticle();
$content = ob_get_clean();
require "template.php"; 
require_once "Models/Article.class.php";
?>