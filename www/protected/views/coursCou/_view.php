<?php
/* @var $this CoursCouController */
/* @var $data CoursCou */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cou_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cou_id), array('view', 'id'=>$data->cou_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thm_id')); ?>:</b>
	<?php echo CHtml::encode($data->thm_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cou_nom')); ?>:</b>
	<?php echo CHtml::encode($data->cou_nom); ?>
	<br />


</div>