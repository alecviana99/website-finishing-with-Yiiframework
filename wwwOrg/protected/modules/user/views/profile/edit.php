<div class="jumbotron">

<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
);
?><h2><?php echo UserModule::t('Edit profile'); ?></h2>
<?php echo CHtml::link(UserModule::t('Profile'),array('/user/profile')); ?>
</br></br>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>

<?php endif; ?>
<div class="span12">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>
</div>
	<p class="note"><i><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></i></p>

	<?php echo $form->errorSummary(array($model)); ?>
<table class="table-condensed table table-striped table-responsive">
	
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'username'); ?>
		</td><td><?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		</td><?php echo $form->error($model,'username'); ?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'email'); ?>
		</td><td><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		</td><?php echo $form->error($model,'email'); ?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'name'); ?>
		</td><td><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		</td><?php echo $form->error($model,'name'); ?>
	</div></tr>
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'first_name'); ?>
		</td><td><?php echo $form->textField($model,'first_name',array('size'=>20,'maxlength'=>20)); ?>
		</td><?php echo $form->error($model,'first_name'); ?>
	</div></tr>
	
	<?php if (isset($model->entreprise)) {?>
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'entreprise'); ?>
		</td><td><?php echo $form->textField($model,'entreprise',array('size'=>20,'maxlength'=>120)); ?>
		</td><?php echo $form->error($model,'entreprise'); ?>
	</div></tr>
	<?php } ?>
	
	<?php if (isset($model->phone)) {?>
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'phone'); ?>
		</td><td><?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		</td><?php echo $form->error($model,'phone'); ?>
	</div></tr>
	<?php } ?>	
	
	<?php if (isset($model->address)) {?>
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'address'); ?>
		</td><td><?php echo $form->textArea($model,'address',array('size'=>20,'maxlength'=>120)); ?>
		</td><?php echo $form->error($model,'address'); ?>
	</div></tr>
	
	<?php } ?>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div><!-- jumbotron -->