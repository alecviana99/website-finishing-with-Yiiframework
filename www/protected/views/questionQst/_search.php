<?php
/* @var $this QuestionQstController */
/* @var $model QuestionQst */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'qst_id'); ?>
		<?php echo $form->textField($model,'qst_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cou_id'); ?>
		<?php echo $form->textField($model,'cou_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qst_question'); ?>
		<?php echo $form->textField($model,'qst_question',array('size'=>60,'maxlength'=>1500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->