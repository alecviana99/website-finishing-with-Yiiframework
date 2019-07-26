<?php
/* @var $this SuggestionSugController */
/* @var $data SuggestionSug */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sug_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sug_id), array('view', 'id'=>$data->sug_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qst_id')); ?>:</b>
	<?php echo CHtml::encode($data->qst_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uti_id')); ?>:</b>
	<?php echo CHtml::encode($data->uti_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('liv_id')); ?>:</b>
	<?php echo CHtml::encode($data->liv_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sug_texte')); ?>:</b>
	<?php echo CHtml::encode($data->sug_texte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sug_date')); ?>:</b>
	<?php echo CHtml::encode($data->sug_date); ?>
	<br />


</div>