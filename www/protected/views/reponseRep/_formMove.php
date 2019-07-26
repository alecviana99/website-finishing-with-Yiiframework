<?php
/* @var $this ReponseRepController */
/* @var $model ReponseRep */
/* @var $form CActiveForm */
?>

<div class="form">

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

<?php
 	//Yii::app()->session['qst_idCree']=$model->qst_id;
	$models=ReponseRep::model()->findAll('qst_id='.$model->rep_id);
	$list=CHtml::listData($models, 'rep_id', 'rep_texte');
	//var_dump($list);
	echo CHtml::dropDownList('ReponseRep',$model,$list,array('empty'=>'sélectionner la réponse qui redirige la question créée'));
	echo CHtml::submitButton('valider');
?>
	
<?php echo CHtml::endForm(); ?>
</div>
