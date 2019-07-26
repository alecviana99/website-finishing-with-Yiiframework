<div class="jumbotron"><!-- jumbotron -->

<?php/*  $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change Password"),
); */
?>

<h2><?php echo UserModule::t("Change password"); ?></h2>
<?php echo CHtml::link(UserModule::t('Profile'),array('/user/profile')); ?>
</br>

<div class="span12">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
)); ?>
</div>
	<i><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></i><br/><br/>
	<?php echo CHtml::errorSummary($model); ?>
	
	<!-- form -->
<table class="table-condensed table table-striped table-responsive">
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'password'); ?>
	</td><td><?php echo $form->passwordField($model,'password'); ?>
	</td><?php echo $form->error($model,'password'); ?>
	</div></tr>
	
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'verifyPassword'); ?>
	</td><td><?php echo $form->passwordField($model,'verifyPassword'); ?>
	</td><?php echo $form->error($model,'verifyPassword'); ?>
	</div></tr>
</table>
	
	<div class="row submit">
	<?php echo CHtml::submitButton(UserModule::t("Save")); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
