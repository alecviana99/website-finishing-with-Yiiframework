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

	<?php echo $form->errorSummary(array($model,$profile)); ?>
<table class="table-condensed table table-striped table-responsive">
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row"><tr><td>
		<?php echo $form->labelEx($profile,$field->varname);
		echo "</td><td>";
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		echo $form->error($profile,$field->varname); ?>
	</td></tr></div>	
			<?php
			}
		}
?>
	
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
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div><!-- jumbotron -->