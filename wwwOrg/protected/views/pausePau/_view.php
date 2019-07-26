
<?php

/* @var $this PausePauController */
/* @var $data PausePau */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Identifiant')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pau_id), array('view', 'id'=>$data->pau_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pause')); ?>:</b>
	<?php echo CHtml::encode($data->pau_phrase); ?>
	<br /><br />


</div>
<?php

?>