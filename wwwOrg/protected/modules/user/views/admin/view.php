<div class="jumbotron">
<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	$model->username,
);
?>
<h1><?php echo UserModule::t('Visualiser').' "'.$model->username.'"'; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Manage manager'),array('admin')),
			CHtml::link(UserModule::t('Mettre à jour manager'),array('update','id'=>$model->id)),
		),
	)); 
	
	echo '<br/>';
	
	$attributes = array(
		//'id',
		'username',
	);
	
	
	array_push($attributes,
		'email','name','first_name',
		array(
			'name' => 'createtime',
			'value' => $model->createtime,
		),
		array(
			'name' => 'lastvisit',
			'value' => ($model->lastvisit)?$model->lastvisit:UserModule::t("Not visited"),
		),
		array(
			'name' => 'superuser',
			'value' => User::itemAlias("AdminStatus",$model->superuser),
		),
		array(
			'name' => 'manager',
			'value' => User::itemAlias("ManagerStatus",$model->manager),
		),
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)
	);
	
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));

?>
</div>