<?php if(UserModule::isManager() && !UserModule::isAdmin()) {
?>

<h2 style="text-align:left; margin-left:20px">Gestion des employés</h2>
<div   >
	<table style="margin:auto; padding:1px">
		<tr><td style="padding:1px"><?php echo CHtml::link(UserModule::t('Créer un employé'),array('/user/manager/create'),array('class' => 'btn enext paneauadmin')); ?></td>
		<td style="padding:1px"><?php echo CHtml::link(UserModule::t('Gérer les employés'),array('/user/manager'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
	</table>
</div>	

<?php
}
?>