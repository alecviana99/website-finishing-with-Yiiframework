<?php
/* @var $this PausePauController */
/* @var $model PausePau */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pause-pau-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pau_phrase'); ?>
		<?php /* echo $form->textArea($model,'pau_phrase',array('style'=>'width: 570px; height: 150px;')); */ ?>
		<?php $form->widget('application.extensions.cleditor.ECLEditor', array(
										'model'=>$model,
										'attribute'=>'pau_phrase',
										
									)); 
									 ?>
		<?php echo $form->error($model,'pau_phrase'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Sauvegarder'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->