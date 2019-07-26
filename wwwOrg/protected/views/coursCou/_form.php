<?php
/* @var $this CoursCouController */
/* @var $model CoursCou */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cours-cou-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
<table class="table-condensed table table-striped table-responsive">

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Thèmes'); ?>
		</td><td><?php
		$themeOptions = CHtml::listData(ThemeThm::model()->findAll('thm_id<>-1'), 'thm_id', 'thm_nom');
		echo $form->dropDownList($model, 'thm_id', $themeOptions, array('prompt' => 'Sélectionner le thème'));
		?></tr>
		</td><?php echo $form->error($model,'thm_id'); ?>
	</div>

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Cours'); ?>
		</td><td><?php echo $form->textField($model,'cou_nom',array('size'=>60,'maxlength'=>100,'style'=>'width: 400px;')); ?>
		</td><?php echo $form->error($model,'cou_nom'); ?>
	</div></tr>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Sauvegarder'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->