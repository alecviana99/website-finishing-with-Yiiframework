<div class="jumbotron">

<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);
?>
<h1><?php echo UserModule::t("Create User"); ?></h1>

<?php 
	echo $this->renderPartial('_menu',array(
		'list'=> array(CHtml::link(UserModule::t('Manage User'),array('admin')),),
	));
	echo '<br/>';
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>

</div>