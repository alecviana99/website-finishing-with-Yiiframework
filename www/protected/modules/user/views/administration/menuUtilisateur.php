<?php if(UserModule::isAdmin()) {
?>

<h2 style="text-align:left; margin-left:20px">Gestion des utilisateurs</h2>
<div>
	<table style="margin:auto; padding:1px">
		<tr><td style="padding:1px"><?php echo CHtml::link(UserModule::t('Create User'),array('/user/admin/create'),array('class' => 'btn enext paneauadmin')); ?></td>
		<td style="padding:1px"><?php echo CHtml::link(UserModule::t('Manage User'),array('/user/admin'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
	</table>
</div>

<?php
}
?>