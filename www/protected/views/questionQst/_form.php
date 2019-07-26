<?php
/* @var $this QuestionQstController */
/* @var $model QuestionQst */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-qst-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 

/* if(isset($_SESSION['nbRep'])
	unset($_SESSION['nbRep']); */
?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
<!--
	<div class="row">
		<?php /* echo $form->labelEx($model,'cou_id'); */ ?>
		<?php 
		/* var_dump($cou = CoursCou::model()->findAll());  */
		//echo $form->dropDownList('Cours' , $select, $cou->cou_nom);  
		?>
		<?php /* echo $form->error($model,'cou_id'); */ ?>
	</div> 
-->
<table class="table-condensed table table-striped table-responsive">

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Cours'); ?>
		</td><td><?php
		$coursOptions = CHtml::listData(CoursCou::model()->findAll('cou_id<>-1'), 'cou_id', 'cou_nom', 'thm.thm_nom');
		echo $form->dropDownList($model, 'cou_id', $coursOptions, array('prompt' => 'Sélectionner le cours'));
		?>
		</td><?php echo $form->error($model,'cou_id'); ?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Question'); ?>
		<?php /* echo $form->textArea($model,'qst_question',array('size'=>60,'maxlength'=>1500,'style'=>'width: 700px; height: 300px;'));  */?>
		</td><td><?php $form->widget('application.extensions.cleditor.ECLEditor', array(
										'model'=>$model,
										'attribute'=>'qst_question',
										
									)); 
									 ?>
		</td><?php echo $form->error($model,'qst_question'); ?>
	</div></tr>
</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Sauvegarder'); ?>
	</div>

<?php $this->endWidget(); 
?>

</div><!-- form -->