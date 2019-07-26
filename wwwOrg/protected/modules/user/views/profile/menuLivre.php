<?php if(UserModule::isAdmin()) {
?>

	<ul class="span4">
		<li ><?php echo CHtml::link(UserModule::t('Créer un livre'),array('/livre/create')); ?></li>
		<li ><?php echo CHtml::link(UserModule::t('Modifier/Supprimer un livre'),array('/livre/admin')); ?></li>
	</ul>

<?php 
}
?>