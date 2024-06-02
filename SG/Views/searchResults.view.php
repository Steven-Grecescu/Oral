<?php ob_start() ?>
<p>Résultats de la recherche pour : <?= $_GET['query'] ?></p>

<div>
    <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <div>
                <h2><?= $article->getNomArticle() ?></h2>
                <img id="imgafficher" src="<?= URL ?>../../../public/images/<?= $article->getImageArticle() ?>" alt="img">
                <p>Description : <?= $article->getDescriptionArticle() ?></p>
                <p>Taille : <?= $article->getTailleArticle() ?></p>
                <p>Prix : <?= $article->getPrixArticle() ?> €</p>
                <p>Ref : <?= $article->getRefArticle() ?></p>
                <form method="POST" action="/Models/Panier.php">
                    <input type="hidden" name="idArticle" value="<?= $article->getIdArticle() ?>">
                    <button type="submit">Ajouter au panier</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun résultat trouvé.</p>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>