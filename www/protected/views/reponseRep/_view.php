<?php
/* @var $this ReponseRepController */
/* @var $data ReponseRep */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rep_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rep_id), array('view', 'id'=>$data->rep_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qst_id')); ?>:</b>
	<?php echo CHtml::encode($data->qst_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qst_redirID')); ?>:</b>
	<?php echo CHtml::encode($data->qst_redirID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rep_texte')); ?>:</b>
	<?php echo CHtml::encode($data->rep_texte); ?>
	<br />


</div>