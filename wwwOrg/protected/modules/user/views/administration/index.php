<?php if(UserModule::isAdmin()) {
?>
<div class="jumbotron" style="text-align:center">
	<h1 >Administration</h1>
	
	<div class="row">

			<div class='row'>
			<?php echo $this->renderPartial('menuUtilisateur');   ?> <!-- permet la modification des livres pour l'admin!-->
			</div>
		
	</div>
	
	<div class="row">

			<div class='row'>
			<?php echo $this->renderPartial('menuLivre');   ?> <!-- permet la modification des livres pour l'admin!-->
			</div>
		
	</div>

	<div class="row">
		<div class='row'>
			<?php echo $this->renderPartial('menuElearning');  ?> <!-- modification de l'Elearning pour l'admin !-->
		</div>
	</div>
</div>

<?php
}
?>