<?php 
    include_once("templates/header.php");
?>   

<div class="container">
    <?php include_once("templates/backbutton.html"); ?>
    <h1 class="main-title">Editar contato</h1>
    <form action="<?= $BASE_URL ?>config/process.php" method="post" class="create-form">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">

        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome" value="<?= $contact['name']?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone:</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Digite o número:" value="<?= $contact['phone']?>"  required>
        </div>
        <div class="form-group">
            <label for="observation">Obs:</label>
            <textarea type="text" rows="3" name="observation" id="observation" class="form-control" placeholder="Observações:"><?= $contact['observation']?></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
    </form>
</div>

<?php 
    include_once("templates/footer.php");
?> 