
<div>
	<table style="margin:auto; padding:1px">
		<?php
		if(UserModule::isEmploye()) {
		?>

		<tr><td colspan="2"><?php echo CHtml::link(UserModule::t('List User'),array('/user/employe'), array('class' => 'btn enext paneauadmin')); ?></td></tr>
		<?php } ?>

		<tr><td colspan="2"><?php echo CHtml::link(UserModule::t('Edit'),array('edit'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
		<tr><td colspan="2"><?php echo CHtml::link(UserModule::t('Change password'),array('changepassword'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
		<tr><td colspan="2"><?php echo CHtml::link(UserModule::t('Logout'),array('/user/logout'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
	</table>
</div>
