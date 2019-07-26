<?php
/* @var $this PausePauController */
/* @var $model PausePau */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pau_id'); ?>
		<?php echo $form->textField($model,'pau_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pau_phrase'); ?>
		<?php echo $form->textField($model,'pau_phrase',array('size'=>60,'maxlength'=>1500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->