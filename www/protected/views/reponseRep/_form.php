<?php
/* @var $this ReponseRepController */
/* @var $model ReponseRep */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reponse-rep-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));
$coursQst=QuestionQst::model()->find('qst_id='.$model->qst_id);

//unset(Yii::app()->session['nbRep']);

if (!isset(Yii::app()->session['nbRep']))
	Yii::app()->session['nbRep']=$_POST['nbRep']/* *3-2 */;

if(Yii::app()->session['noRep']==0)
	Yii::app()->session['noRep']=1;
	

?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
	
	<!-- <div class="row">
		<?php /* echo $form->labelEx($model,'qst_id'); */ ?>
		<?php /* echo $form->textField($model,'qst_id'); */ ?>
		<?php /* echo $form->error($model,'qst_id'); */ ?>
	</div> -->
	
	
	<h3>Réponse n°<?php echo /* ( */Yii::app()->session['noRep']/* +2)/3 */ . "/" . /* ( */Yii::app()->session['nbRep']/* +2)/3 */ ." du cours n°".$coursQst->cou_id; ?></h3>
<table class="table-condensed table table-striped table-responsive">

	<tr><div class="row">
		
		<td><?php echo $form->labelEx($model,'Questions redirigé'); ?>
		</td><td><?php
			$questionOptions = CHtml::listData(QuestionQst::model()->findAll('qst_id<>-1 AND cou_id='.$coursQst->cou_id), 'qst_id', 'qst_question');
			echo $form->dropDownList($model, 'qst_redirID', $questionOptions, array('prompt'=>'Aucune redirection'));
		?>
		<!--<?php /* echo $form->textField($model,'qst_redirID'); */ ?>-->
		</td><?php echo $form->error($model,'qst_redirID'); ?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'texte de la réponse'); ?>
		</td><td><?php echo $form->textField($model,'rep_texte',array('size'=>60,'maxlength'=>100)); ?>
		</td><?php echo $form->error($model,'rep_texte'); ?>
	</div></tr>
	<br/>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Sauvegarder'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->