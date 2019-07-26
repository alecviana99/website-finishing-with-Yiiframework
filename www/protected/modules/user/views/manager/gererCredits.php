<div class="jumbotron">
<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('manager'),
	UserModule::t('Manage'),
);
?>
<?php
	echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Profile'),array('/user/profile')),
			CHtml::link(UserModule::t('Ajouter du crédits à tout vos employés'),array('ajoutCreditsATous')),
			CHtml::link(UserModule::t('Ajouter du crédits à un employé'),array('ajoutCreditsIndividuel')),
		),
	));
?>
</div>