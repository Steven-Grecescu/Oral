<?php ob_start();

$content = ob_get_clean();

require_once "Views/template.php";
require_once "Models/Panier.class.php";
require_once "Models/PanierManager.php";
// require_once "Controllers/ArticleController.php";


?>
<link rel="stylesheet" href="../Genres/style.css">
<?php $panierManager = new PanierManager();
        $panierManager->chargementPanier();
        $panier = $panierManager->getPanier(); 

        $ArticleController = new ArticleController;

    
        
?>

<div class="table-container">
<?php if (isset($panier)):?>
    <table class="">
        <caption>Votre Panier</caption>
        <thead class="table-light">

            <tr>
                <th>Nom</th>
                <th>Image</th>
                <th>Taille</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            
            <?php foreach ($panier as $articlePanier): ?>
                <tr class="table-primary">
                    <?= $ArticleController->afficherArticlePanier($articlePanier->getIdArticle()) ?>
                    <td><form action="<?= URL ?>removeItem/<?=$articlePanier->getIdPanier();?>" method="post">
                        <input type="hidden" value="<?= $articlePanier->getIdArticle() ?>">
                        <button type="submit">Supprimer</button>
                    </form></td>
                </tr>
            <?php endforeach; ?>
            <?php else:  ?>
                <p>Votre panier est vide</p>
                <?php endif ?>
        </tbody>
    </table>
</div>

