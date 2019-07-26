<div class="jumbotron">

<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('employe'),
	$model->username,
);
?>
<h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			
		),
	)); 


	$attributes = array(
		'id',
		'username',
	);
	
	// $profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	// if ($profileFields) {
		// foreach($profileFields as $field) {
			// array_push($attributes,array(
					// 'label' => UserModule::t($field->title),
					// 'name' => $field->varname,
					// 'type'=>'raw',
					// 'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				// ));
		// }
	// }
	
	array_push($attributes,
		/*'password',*/
		'email',
		'activkey',
		array(
			'name' => 'createtime',
			'value' => date("d.m.Y H:i:s",$model->createtime),
		),
		array(
			'name' => 'lastvisit',
			'value' => (($model->lastvisit)?date("d.m.Y H:i:s",$model->lastvisit):UserModule::t("Not visited")),
		),
		array(
			'name' => 'employe',
			'value' => User::itemAlias("EmployeStatus",$model->employe),
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