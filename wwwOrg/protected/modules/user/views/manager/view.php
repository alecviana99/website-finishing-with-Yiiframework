<?php
/* $this->breadcrumbs=array(
	UserModule::t('Users')=>array('manager'),
	$model->username,
); */
?>
<div class="jumbotron">
<h1><?php echo UserModule::t('View Employee').' "'.$model->username.'"'; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create Employee'),array('create')),
			CHtml::link(UserModule::t('Update Employee'),array('update','id'=>$model->id)),
			CHtml::linkButton(UserModule::t('Delete Employee'),array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
		),
	)); 

	$attributes = array(
		'id',
		'username',
	);
	
	array_push($attributes,
		'password',
		'email',
		'name',
		'first_name',
		
		array(
			'name' => 'lacategorie',
			'value' => $model->lacategorie,
		),
		
		array(
			'name' => 'heures_formation',
			'value' => $model->heures_formation,
		),
		
		array(
			'name' => 'minutes_formation',
			'value' => $model->minutes_formation,
		),
		
		array(
			'name' => 'secondes_formation',
			'value' => $model->secondes_formation,
		),
		
		array(
			'name' => 'createtime',
			'value' => $model->createtime,
		),
		array(
			'name' => 'lastvisit',
			'value' => (($model->lastvisit)?$model->lastvisit:UserModule::t("Not visited")),
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