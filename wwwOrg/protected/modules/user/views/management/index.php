<?php if(UserModule::isManager() && !UserModule::isAdmin()) {
?>
<div class="jumbotron" style="text-align:center">
	<h1 >Management</h1>
	
	<div class="row">
			<div class='row'>
			<?php echo $this->renderPartial('menuEmploye');   ?> <!-- permet la consultation des achats de crédites pour le manager!-->
			</div>
	</div>

	<div class="row">
		<div class='row'>
			<?php echo $this->renderPartial('menuElearning');  ?> <!-- gestion des crédits de temps pour le manager !-->
		</div>
	</div>
</div>

<?php
}else{
		echo "Vous n'êtes pas autorisé à ouvrir cette page !";
}
?>

