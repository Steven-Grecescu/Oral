<?php ob_start();

$content = ob_get_clean();
require_once "template.php";
?>

<html>
<body>
<main>


<ul>
    <li>
        <label for="">Nom : </label>
        <?= $_SESSION['nom']  ?>
    </li>

    <li>
        <label for="">Prenom : </label>
        <?= $_SESSION['prenom']?>
    </li>

    <li>
        <label for="">Email : </label>
        <?= $_SESSION['email']?>
    </li>

    <li>
        <label for="">Adresse : </label>
        <?= $_SESSION['adresse']?>
    </li>

    <li>
        <label for="">Telephone : </label>
        <?= $_SESSION['tel']?>
    </li>

</ul>





</main>
</body>
</html>