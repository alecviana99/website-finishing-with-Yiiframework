<div class="jumbotron">

<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('employe'),
	UserModule::t('Manage'),
);
?>
<h1><?php echo UserModule::t("Liste des employés");?></h1>



<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
		),
	));
?>

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
		'columns'=>array(
 			array(
				'name' => 'id',
				'type'=>'raw',
				'value' => 'CHtml::link(CHtml::encode($data->id),array("employe/view","id"=>$data->id))',
			), 
			array(
				'name' => 'username',
				'type'=>'raw',
				'value' => 'CHtml::link(CHtml::encode($data->username),array("employe/view","id"=>$data->id))',
			),
			array(
				'name'=>'email',
				'type'=>'raw',
				'value'=>'CHtml::link(CHtml::encode($data->email), "mailto:".$data->email)',
			),
			array(
				'name' => 'createtime',
				'value' => 'date("d.m.Y H:i:s",$data->createtime)',
			),
			array(
				'name' => 'lastvisit',
				'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
			),
			array(
				'name'=>'status',
				'value'=>'User::itemAlias("UserStatus",$data->status)',
			),
/* 			array(
				'name'=>'manager',
				'value'=>'User::itemAlias("ManagerStatus",$data->manager)',
			), */
/* 			array(
				'name'=>'employe',
				'value'=>'User::itemAlias("EmployeStatus",$data->employe)',
			), */
			array(
				'name'=>'Createur',
				'type'=>'raw',
				'value'=>'CHtml::link(CHtml::encode($data->idcreateur),array("employe/view","id"=>$data->idcreateur))',
			),  
		),
));
?>

</div>