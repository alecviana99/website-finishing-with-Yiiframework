<?php
/* @var $this SuggestionSugController */
/* @var $model SuggestionSug */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'sug_id'); ?>
		<?php echo $form->textField($model,'sug_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qst_id'); ?>
		<?php echo $form->textField($model,'qst_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uti_id'); ?>
		<?php echo $form->textField($model,'uti_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'liv_id'); ?>
		<?php echo $form->textField($model,'liv_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sug_texte'); ?>
		<?php echo $form->textField($model,'sug_texte',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sug_date'); ?>
		<?php echo $form->textField($model,'sug_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->