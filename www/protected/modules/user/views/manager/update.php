<div class="jumbotron">

<?php
/* $this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('manager'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
); */
?>

<h1><?php echo  UserModule::t('Update User')." ".$model->username; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create User'),array('create')),
			CHtml::link(UserModule::t('View User'),array('view','id'=>$model->id)),
		),
	)); 		
		/* HistoQuestionHqs::model()->deleteAll(
		'uti_id=:uti_id',
		array(':uti_id' =>$model->id,
		));
		
		$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
			':cre_iduser'=>$model->id,
		));
		
		$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
			':cre_iduser'=>Yii::app()->user->id,
		));
		
		$newCredit = $creditMan->cre_credit + $creditEmp->cre_credit;
		
		$creditMan->setAttribute("cre_credit", $newCredit);
		$creditMan->save();
		
		CreditCre::model()->deleteAll(
		'cre_iduser=:cre_iduser',
		array(':cre_iduser' =>$model->id,
		)); */
		
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile)); ?>
</div>
	