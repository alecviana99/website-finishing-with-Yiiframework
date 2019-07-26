<?php
/* @var $this QuestionQstController */
/* @var $data QuestionQst */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('qst_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->qst_id), array('view', 'id'=>$data->qst_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cou_id')); ?>:</b>
	<?php echo CHtml::encode($data->cou_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qst_question')); ?>:</b>
	<?php echo CHtml::encode($data->qst_question); ?>
	<br />


</div>