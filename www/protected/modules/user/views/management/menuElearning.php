<?php if(UserModule::isManager() && !UserModule::isAdmin()) {
?>

<h2 style="text-align:left; margin-left:20px">Gestion crédits de temps</h2>
<div   >
	<table style="margin:auto; padding:1px">
		<tr><td colspan="2"><?php echo CHtml::link(UserModule::t('Historique des achats de crédit'),array('/user/manager/histoCreAchetes'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
		<tr><td colspan="2"><?php echo CHtml::link(UserModule::t('Page de test : achat de crédits de temps'),array('/user/manager/testAcheterCre'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
	</table>
</div>	

<?php
}
?>