<?php
/* @var $this CoursCouController */
/* @var $model CoursCou */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cou_id'); ?>
		<?php echo $form->textField($model,'cou_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thm_id'); ?>
		<?php echo $form->textField($model,'thm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cou_nom'); ?>
		<?php echo $form->textField($model,'cou_nom',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->