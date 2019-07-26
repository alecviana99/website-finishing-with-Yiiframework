

<?php
/* @var $this ThemeThmController */
/* @var $model ThemeThm */
/* @var $form CActiveForm */
?>

<div class="form">
<br/>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'theme-thm-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Les champs avec <span class="required">*</span> sont obligatoires.</p>
	-->
	<?php echo $form->errorSummary($model); ?>
<table class="table-condensed table table-striped table-responsive">

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'thm_nom'); ?>
		</td><td><?php echo $form->textField($model,'thm_nom',array('size'=>60,'maxlength'=>100)); ?>
		</td><?php echo $form->error($model,'thm_nom'); ?>
	</div></tr>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Sauvegarder'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
