<?php if(UserModule::isAdmin()) {
?>
<div>
	<h2 style="text-align:left; margin-left:20px">Modification des livres </h2>
	<table style="margin:auto;">
		<tr><td style="padding:1px"><?php echo CHtml::link(UserModule::t('Créer un livre'),array('/livre/create'),array('class' => 'btn enext paneauadmin')); ?></td>
		<td style="padding:1px"><?php echo CHtml::link(UserModule::t('Modifier/Supprimer un livre'),array('/livre/admin'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
	</table>
</div>
<?php 
}
?>