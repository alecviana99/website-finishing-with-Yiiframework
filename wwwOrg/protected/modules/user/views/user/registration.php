<div class="jumbotron">


<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h1><?php echo UserModule::t("Inscription"); ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('<i>Les champs munis d\'une <span class="required">*</span> sont obligatoires.</i>'); ?></p>
	
	 <?php //echo $form->errorSummary(array($model,$profile)); ?>
	
	<table class="table-condensed table table-striped table-responsive">
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'username'); ?>
	</td><td><?php echo $form->textField($model,'username'); ?>
	</td><?php echo $form->error($model,'username'); ?>
	</div></tr>
	
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'password'); ?>
	</td><td><?php echo $form->passwordField($model,'password'); ?>
	</td><?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Le mot de passe doit contenir au moins 4 caractères."); ?>
	</p>
	</div></tr>
	
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'verifyPassword'); ?>
	</td><td><?php echo $form->passwordField($model,'verifyPassword'); ?>
	</td><?php echo $form->error($model,'verifyPassword'); ?>
	</div></tr>
	
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'email'); ?>
	</td><td><?php echo $form->textField($model,'email'); ?>
	</td><?php echo $form->error($model,'email'); ?>
	</div></tr>
		
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'name'); ?>
	</td><td><?php echo $form->textField($model,'name'); ?>
	</td><?php echo $form->error($model,'name'); ?>
	</div></tr>
    <tr><div class="row">
	<td><?php echo $form->labelEx($model,'first_name'); ?>
	</td><td><?php echo $form->textField($model,'first_name'); ?>
	</td><?php echo $form->error($model,'first_name'); ?>
	</div></tr>
	
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'entreprise'); ?>
	</td><td><?php echo $form->textField($model,'entreprise'); ?>
	</td><?php echo $form->error($model,'entreprise'); ?>
	</div></tr>
	
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'phone'); ?>
	</td><td><?php echo $form->textField($model,'phone'); ?>
	</td><?php echo $form->error($model,'phone'); ?>
	</div></tr>
	
	<tr><div class="row">
	<td><?php echo $form->labelEx($model,'address'); ?>
	</td><td><?php echo $form->textArea($model,'address'); ?>
	</td><?php echo $form->error($model,'address'); ?>
	</div></tr>
	

	<?php if (UserModule::doCaptcha('registration')): ?>
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'verifyCode'); ?>
		
		<?php $this->widget('CCaptcha'); ?>
		</td><td><?php echo $form->textField($model,'verifyCode'); ?>
		</td><?php echo $form->error($model,'verifyCode'); ?>
		
		<p class="hint"><?php echo UserModule::t("Merci de recopier le code de confirmation."); ?>
		<br/><?php echo UserModule::t("Le code n'est pas sensible à la casse."); ?></p>
	</div></tr>
	<?php endif; ?>
	</table>
	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("S'inscrire")); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>

</div>