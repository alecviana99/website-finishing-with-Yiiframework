<?php
/* @var $this CategorieCatController */
/* @var $data CategorieCat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cat_id), array('view', 'id'=>$data->cat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_libelle')); ?>:</b>
	<?php echo CHtml::encode($data->cat_libelle); ?>
	<br />


</div>