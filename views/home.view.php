<?php 
$title = "Register"; // ici vous ne mettez que le nom du titre de la page
include("includes/partials/header.php"); 
?>

<div class="container pt-4">
    <div class="row justify-content-center align-item-center">
        <div class="col-6">
            <form method="POST">
				<?php include ("./includes/errors/flash_message.php"); ?>
				<?php include ("./includes/errors/errors.php"); ?>
                <div class="row">
                    <div class="col">
                        <input type="text" name="nom" class="form-control" value="<?= get_input("nom") ?>" placeholder="Nom">
                    </div>
                    <div class="col">
                        <input type="text" name="prenom" class="form-control" value="<?= get_input("prenom") ?>" placeholder="Prenom">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <input type="text" name="pseudo" class="form-control" value="<?= get_input("pseudo") ?>" placeholder="Pseudo">
                    </div>
                    <div class="col">
                        <input type="email" name="email" class="form-control" value="<?= get_input("email") ?>" placeholder="Email">
                    </div>
                </div>

                <div class="row mt-4">
					<div class="col">
						<input type="password" name="password" class="form-control"  placeholder="Mot de Passe">
					</div>
					<div class="col">
						<input type="password" name="repassword" class="form-control"  placeholder="Confirmation du Passe">
					</div>

                </div>

				<div class="row mt-4">
					<div class="col">
						<input type="submit" name="register" class="btn btn-primary" value="Enregistrer">
					</div>					
				</div>
            </form>
        </div>
    </div>
</div>

<?php include("includes/partials/footer.php"); ?>