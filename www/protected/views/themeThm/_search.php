<?php
/* @var $this ThemeThmController */
/* @var $model ThemeThm */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'thm_id'); ?>
		<?php echo $form->textField($model,'thm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thm_nom'); ?>
		<?php echo $form->textField($model,'thm_nom',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->