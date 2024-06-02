<?php ob_start();

$content = ob_get_clean();
require_once "Views/template.php";
require_once "Models/Article.class.php";
require_once "Models/ArticleManager.php";


?>
    <link rel="stylesheet" href="../Genres/Homme/style.css">
    <main>
        <h2>Hommes</h2>
<div>        
        <?php for($i=0;$i<count($articles);$i++) : ?>
        <?php if($articles[$i]->getGenreArticle() === "Homme") : ?>
<article class="ArticleGenre">
<a href="<?= URL ?>article/<?= $articles[$i]->getIdArticle();?>"><img src="../public/images/<?= $articles[$i]->getImageArticle(); ?>" alt="IMG"></a>
    <h3><?= $articles[$i]->getNomArticle();?></h3>
</article>
        <?php endif;?>
        


<?php endfor; ?>
</div>
    </main>
</body>
</html>