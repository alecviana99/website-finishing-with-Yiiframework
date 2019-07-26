<?php
/* @var $this CategorieCatController */
/* @var $model CategorieCat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categorie-cat-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
<table class="table-condensed table table-striped table-responsive">
	<div class="row"><tr>
		<td><?php echo $form->labelEx($model,'cat_libelle'); ?></td>
		<td><?php echo $form->textField($model,'cat_libelle',array('size'=>50,'maxlength'=>50)); ?></td>
		<td><?php echo $form->error($model,'cat_libelle'); ?></td>
	</tr></div>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Modifier'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->