<?php ob_start();

$content = ob_get_clean();
// require_once "C:\Users\DWWM\Desktop\Repo Orga\Magasin-Vetement-SG\Views/template.php";
// require_once "C:\Users\DWWM\Desktop\Repo Orga\Magasin-Vetement-SG\Models/Article.class.php";
// require_once "C:\Users\DWWM\Desktop\Repo Orga\Magasin-Vetement-SG\Models/Model.class.php";
// require_once "C:\Users\DWWM\Desktop\Repo Orga\Magasin-Vetement-SG\Models\ArticleManager.php";
// require_once "C:\Users\DWWM\Desktop\Repo Orga\Magasin-Vetement-SG\Controller/ArticleController.php";

require_once "template.php";
require_once "index.php";
require_once "Models/Article.class.php";
require_once "Models/Model.class.php";
require_once "Models/ArticleManager.php";
require_once "Controller/ArticleController.php";
?>
<link rel="stylesheet" href="/public/style.css">

<main>
<table class="crud-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Taille</th>
                    <th>Prix</th>
                    <th>Genre</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Réf</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $articleManager = new ArticleManager();
                $articleManager->chargementArticle();
                $articles = $articleManager->getArticle();
                ?>
                <?php if (isset($articles)) : ?>
                    <?php foreach ($articles as $article) : ?>
                        <tr>
                            <td><img src="../public/images/<?= $article->getImageArticle(); ?>" alt="<?= $article->getNomArticle(); ?>" class="article-image"></td>
                            <td><a href="<?= URL ?>crud/l/<?= $article->getIdArticle(); ?>" class="article-link"><?= $article->getNomArticle(); ?></a></td>
                            <td><?= $article->getTailleArticle(); ?></td>
                            <td><?= $article->getPrixArticle(); ?></td>
                            <td><?= $article->getGenreArticle(); ?></td>
                            <td><?= $article->getTypeArticle(); ?></td>
                            <td><?= $article->getDescriptionArticle(); ?></td>
                            <td><?= $article->getRefArticle(); ?></td>
                            <td>
                                <form method="POST" action="<?= URL ?>crud/s/<?= $article->getIdArticle(); ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer l\'article ?');">
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form>
                            </td>
                            <td>
                                <a href="<?= URL ?>crud/m/<?= $article->getIdArticle(); ?>" class="btn-modify"><button>Modifier</button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="<?= URL ?>crud/a" class="btn-add"><button>Ajouter</button></a>
    <?php ?>
</main>

</body>
</html>