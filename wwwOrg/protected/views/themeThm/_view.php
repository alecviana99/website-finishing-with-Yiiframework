<?php
/* @var $this ThemeThmController */
/* @var $data ThemeThm */

?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('thm_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->thm_id), array('view', 'id'=>$data->thm_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thm_nom')); ?>:</b>
	<?php echo CHtml::encode($data->thm_nom); ?>
	<br />


</div>
