<div class="jumbotron">
<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);
?>

<h1><?php echo  UserModule::t('Mettre à jour')." \"".$model->username."\""; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Manage User'),array('admin')),
			CHtml::link(UserModule::t('Visualiser l\'utilisateur'),array('view','id'=>$model->id)),
			
		),
	)); 
		
	echo '<br/>';
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile)); ?>
</div>