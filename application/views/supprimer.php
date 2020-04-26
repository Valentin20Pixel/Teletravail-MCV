<?php include "header.php";
	echo validation_errors();
	echo form_open_multipart();	 ?>

<body>
<button class="btn btn-outline-danger"><a href=""> Retour au produit</a></button>
<?php echo form_open(); ?>
<div class="form-group">
    <label for="supp" class="form-check-label">Etes vous sur de vouloir supprimer le produit? </label>
    <input type= 'checkbox' name="supp" id="supp" value = "1">
</div>
<button class="btn btn-outline-secondary" type="submit" >Valider</button>
</form>
</form>
</div>