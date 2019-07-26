<?php
/* @var $this SuggestionSugController */
/* @var $model SuggestionSug */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suggestion-sug-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'qst_id'); ?>
		<?php echo $form->textField($model,'qst_id'); ?>
		<?php echo $form->error($model,'qst_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uti_id'); ?>
		<?php echo $form->textField($model,'uti_id'); ?>
		<?php echo $form->error($model,'uti_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'liv_id'); ?>
		<?php echo $form->textField($model,'liv_id'); ?>
		<?php echo $form->error($model,'liv_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sug_texte'); ?>
		<?php echo $form->textField($model,'sug_texte',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'sug_texte'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sug_date'); ?>
		<?php echo $form->textField($model,'sug_date'); ?>
		<?php echo $form->error($model,'sug_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->