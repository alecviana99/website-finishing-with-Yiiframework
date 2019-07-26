<?php
/* @var $this LivreController */
/* @var $model LIVRE */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_LIVRE'); ?>
		<?php echo $form->textField($model,'ID_LIVRE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ADM_ID'); ?>
		<?php echo $form->textField($model,'ADM_ID'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'id_categorie'); ?>
		<?php echo $form->textField($model,'id_categorie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LIV_TITRE'); ?>
		<?php echo $form->textField($model,'LIV_TITRE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LIV_AUTEUR'); ?>
		<?php echo $form->textField($model,'LIV_AUTEUR',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LIV_NBPAGE'); ?>
		<?php echo $form->textField($model,'LIV_NBPAGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LIV_DEMO'); ?>
		<?php echo $form->fileField($model,'LIV_DEMO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LIV_SERVEUR'); ?>
		<?php echo $form->fileField($model,'LIV_SERVEUR'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->