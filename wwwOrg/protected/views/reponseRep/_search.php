<?php
/* @var $this ReponseRepController */
/* @var $model ReponseRep */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rep_id'); ?>
		<?php echo $form->textField($model,'rep_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qst_id'); ?>
		<?php echo $form->textField($model,'qst_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qst_redirID'); ?>
		<?php echo $form->textField($model,'qst_redirID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rep_texte'); ?>
		<?php echo $form->textField($model,'rep_texte',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->