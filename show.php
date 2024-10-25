<?php include_once("templates/header.php");?>

<div class="container view-contact-container">
    <?php include_once("templates/backbutton.html") ?>
    <h1 class="main-title"><?= $contact['name']; ?></h1>
    <p class="bold">Telefone:</p>
    <p><?= $contact['phone'] ?></p>
    <p class="bold">Observações:</p>
    <p><?= $contact['observation'] ?></p>
</div>

<?php include_once("templates/footer.php"); ?>