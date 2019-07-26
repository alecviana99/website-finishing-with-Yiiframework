<div class="form">
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

<?php
 	Yii::app()->session['qst_idCree']=$model->qst_id;
	echo CHtml::button('Première question du cours', array('submit' => array('questionQst/premiereQst','id'=>Yii::app()->session['qst_idCree'])));
	//echo Yii::app()->session['qst_idCree'];
	$models=QuestionQst::model()->findAll('cou_id='.$model->cou_id);
	$list=CHtml::listData($models, 'qst_id', 'qst_question');
	//echo CHtml::listData(QuestionQst::model()->findAll('cou_id='.$model->cou_id), 'cou_id', 'cou_nom');
	echo CHtml::dropDownList('QuestionQst',$model,$list,array('empty'=>'sélectionner une question'));
	echo CHtml::submitButton('valider');
?>

<?php echo CHtml::endForm(); ?>
</div>